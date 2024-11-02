<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat-room.{chatRoomId}', function ($user, $chatRoomId) {
    // Add logic here to check if the user has access to this chat room
    return $user->canAccessChatRoom($chatRoomId);
});
