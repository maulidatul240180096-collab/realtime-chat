<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>

    <link rel="stylesheet" href="/css/chat.css">
</head>
<body>

<h2>💬 Chat</h2>

<div class="chat-list">

@foreach($chatList as $chat)

    <a href="{{ route('chat.show', $chat['user']->id) }}"
       class="chat-item">

        <div class="chat-name">
            {{ $chat['user']->name }}
        </div>

        <div class="chat-last-message">
            {{ $chat['last_message']->message }}
        </div>

        <div class="chat-count">
    {{ $chat['count'] }} pesan
</div>

    </a>

@endforeach

</div>

</body>
</html>