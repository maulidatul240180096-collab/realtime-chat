<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show($userId)
    {
        $authId = Auth::id();

        $messages = Message::where(function ($q) use ($authId, $userId) {
                $q->where('sender_id', $authId)
                  ->where('receiver_id', $userId);
            })
            ->orWhere(function ($q) use ($authId, $userId) {
                $q->where('sender_id', $userId)
                  ->where('receiver_id', $authId);
            })
            ->orderBy('created_at', 'asc')
            ->get();

            Message::where('sender_id', $userId)
    ->where('receiver_id', Auth::id())
    ->where('is_read', false)
    ->update([
        'is_read' => true
    ]);
        $user = User::findOrFail($userId);

   return view('chat.show', compact('messages', 'user'));
}

public function getMessages($userId)
{
    $authId = Auth::id();

    $messages = Message::where(function ($q) use ($authId, $userId) {
            $q->where('sender_id', $authId)
              ->where('receiver_id', $userId);
        })
        ->orWhere(function ($q) use ($authId, $userId) {
            $q->where('sender_id', $userId)
              ->where('receiver_id', $authId);
        })
        ->orderBy('created_at', 'asc')
        ->get();

    return response()->json($messages);
}

public function index()
{
    $authId = Auth::id();

    $messages = Message::where('sender_id', $authId)
        ->orWhere('receiver_id', $authId)
        ->orderBy('created_at', 'desc')
        ->get();

    
    $chats = $messages->groupBy(function ($msg) use ($authId) {
        return $msg->sender_id == $authId
            ? $msg->receiver_id
            : $msg->sender_id;
    });

    $chatList = [];

   foreach ($chats as $userId => $msgs) {

    $unread = Message::where('sender_id', $userId)
        ->where('receiver_id', $authId)
        ->where('is_read', false)
        ->count();

    $chatList[] = [
        'user' => User::find($userId),
        'last_message' => $msgs->first(),
        'unread' => $unread
    ];

}

    return view('dashboard', compact('chatList'));
}
}
