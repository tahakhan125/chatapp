<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['chat_room_id' , 'user_id' , 'message' , 'video_path', 'image_path'];

    public function chatRoom() {
        return $this->belongsTo(ChatRoom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
