<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\ChatRoom;
use App\Models\ChatRoomUser;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function listRoom(){

        $room = ChatRoom::paginate(20);

        return response()->json(['message' => 'All Rooms!','data' => $room]);
    }

    public function createRoom(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $room = ChatRoom::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Room Created!','data' => $room]);
    }

    public function removeRoom(Request $request){
        $request->validate([
            'chat_room_id' => 'required'
        ]);

        $room = ChatRoom::find($request->chat_room_id);

        if(!$room){
            return response()->json(['message' => 'Room Removed Already!']);
        }

        $room->delete();

        ChatRoomUser::where('chat_room_id', $request->chat_room_id)->delete();

        return response()->json(['message' => 'Room Removed!']);
    }

    public function joinRoom(Request $request){
        $request->validate([
            'user_id' => 'required',
            'chat_room_id' => 'required'
        ]);

        $limit = 2;

        $room = ChatRoomUser::where('chat_room_id' , $request->chat_room_id)->get();

        if($room){
            $room_user = $room->where('user_id' , $request->user_id)->first();
            if($room_user){
                return response()->json(['message' => 'Room Already Joined!']);
            }
            // dd($room_user, count($room->toArray()) == $limit);
            if(count($room->toArray()) == $limit){
                return response()->json(['message' => 'Room Already Full!']);
            }
        }

        ChatRoomUser::create([
            'user_id' => $request->user_id,
            'chat_room_id' => $request->chat_room_id
        ]);

        return response()->json(['message' => 'Room Joined!']);
    }

    public function leaveRoom(Request $request){
        $request->validate([
            'user_id' => 'required',
            'chat_room_id' => 'required'
        ]);

        $room = ChatRoomUser::where('user_id',$request->user_id)->where('chat_room_id', $request->chat_room_id)->first();

        if(!$room){
            return response()->json(['message' => 'Room Left Already Or Not Found!']);
        }

        $room->delete();

        return response()->json(['message' => 'Room Left!']);
    }

    public function listMessage(){
        $message = Message::paginate(20);
        return response()->json(['message' => 'All Messages!' ,'data' => $message]);
    }

    public function sendMessage(Request $request) {

        $request->validate([
            'message' => 'nullable|string|required_without_all:image,video',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|required_without_all:message,video', // max 2MB
            'video' => 'nullable|mimes:mp4,mov,avi,flv|max:10240|required_without_all:image,message', // max 10MB
        ]);

        $room = ChatRoomUser::where('user_id' , auth()->id())->where('chat_room_id' , $request->chat_room_id)->get()->first();
        if(!$room){
            return response()->json(['message' => 'Room Not Joined!']);
        }

        $message = new Message([
            'chat_room_id' => $request->chat_room_id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('root/images', 'public');
            $message->image_path = $path;
        }

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('root/videos', 'public');
            $message->video_path = $path;
        }

        $message->save();

        broadcast(new MessageSent($message));

        return response()->json(['message' => 'Sended Successfully!' ,'data' => $message]);
    }

    public function removeMessage(Request $request) {
        $message = Message::find($request->id);
        $message->delete();
        return response()->json(['message'=> 'Message Deleted Successfully!']);
    }

}
