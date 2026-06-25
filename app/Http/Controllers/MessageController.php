<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }

    public function destroy(Message $message)
{
    // hanya boleh hapus pesan sendiri
    if ($message->sender_id != Auth::id()) {
        abort(403);
    }

    $receiverId = $message->receiver_id;

    $message->delete();

    return redirect()->route('chat.show', $receiverId);
}
}