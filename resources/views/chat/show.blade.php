<link rel="stylesheet" href="/css/chat.css">

<div class="chat-container">

    <div class="chat-header">
      <a href="{{ route('dashboard') }}" class="back-icon">
        ←
    </a>

    <div>
        <h3>{{ $user->name }}</h3>
        <small>Online</small>
    </div>

</div>

   <div class="chat-box" id="chatBox">

@foreach($messages as $msg)

    @if($msg->sender_id == auth()->id())

        <!-- Pesan saya -->
        <div class="chat-bubble me">

            <div class="message-text">
                {{ $msg->message }}
            </div>

            <div class="message-time">
                {{ $msg->created_at->format('H:i') }}

                @if($msg->is_read)
                    ✓✓
                @else
                    ✓
                @endif
            </div>

        </div>

    @else

        <!-- Pesan lawan -->
        <div class="chat-bubble other">

            <div class="message-text">
                {{ $msg->message }}
            </div>

            <div class="message-time">
                {{ $msg->created_at->format('H:i') }}
            </div>

        </div>

    @endif

@endforeach

</div>

    <form class="chat-form" method="POST" action="/message/send">
        @csrf

        <input type="hidden" name="receiver_id" value="{{ $user->id }}">

        <input type="text" name="message" placeholder="Tulis pesan..." required>

        <button type="submit">Kirim</button>
    </form>

<script>
window.onload = function() {
    let chatBox = document.getElementById('chatBox');
    chatBox.scrollTop = chatBox.scrollHeight;
}
</script>

</div>