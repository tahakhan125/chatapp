<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoomUser extends Model
{
    protected $fillable = ['chat_room_id', 'user_id'];
}
