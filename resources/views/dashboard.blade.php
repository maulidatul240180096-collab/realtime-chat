<link rel="stylesheet" href="/css/dashboard.css">

<x-app-layout>

<div class="dashboard-container">

    <form action="{{ route('dashboard') }}" method="GET">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="🔍 Cari kontak..."
            class="search-box">

    </form>

    <div class="chat-list" id="chatList">

        @forelse($chatList as $chat)

        <a href="{{ route('chat.show',$chat['user']->id) }}"
           class="chat-item">

            <div class="avatar">

                @if($chat['user']->photo)

                    <img src="{{ asset('storage/'.$chat['user']->photo) }}">

                @else

                    {{ strtoupper(substr($chat['user']->name,0,1)) }}

                @endif

            </div>

            <div class="chat-info">

                <div class="chat-top">

                    <div class="chat-name">
                        {{ $chat['user']->name }}
                    </div>

                    <div class="chat-right">

                        <div class="chat-time">
                            {{ $chat['last_message']->created_at->format('H:i') }}
                        </div>

                        @if($chat['unread'] > 0)

                            <div class="unread-badge">
                                {{ $chat['unread'] }}
                            </div>

                        @endif

                    </div>

                </div>

                <div class="chat-message">
                    {{ $chat['last_message']->message }}
                </div>

            </div>

        </a>

        @empty

            <div class="empty-chat">
                Belum ada chat
            </div>

        @endforelse

    </div>

</div>


<script>

function loadChats() {

    fetch('/dashboard/chats')
        .then(response => response.json())
        .then(data => {

            let html = '';

            data.forEach(chat => {

                let badge = '';

                if (chat.unread > 0) {

                    badge = `
                        <div class="unread-badge">
                            ${chat.unread}
                        </div>
                    `;

                }

                let avatar = '';

                if (chat.photo) {

                    avatar = `
                        <img src="/storage/${chat.photo}">
                    `;

                } else {

                    avatar = chat.name.charAt(0).toUpperCase();

                }

                html += `

                    <a href="/chat/${chat.id}"
                       class="chat-item">

                        <div class="avatar">

                            ${avatar}

                        </div>

                        <div class="chat-info">

                            <div class="chat-top">

                                <div class="chat-name">
                                    ${chat.name}
                                </div>

                                <div class="chat-right">

                                    <div class="chat-time">
                                        ${chat.time}
                                    </div>

                                    ${badge}

                                </div>

                            </div>

                            <div class="chat-message">
                                ${chat.last_message}
                            </div>

                        </div>

                    </a>

                `;

            });

            document.getElementById('chatList').innerHTML = html;

        })
        .catch(error => {

            console.log(error);

        });

}

setInterval(loadChats, 1000);

</script>

</x-app-layout>
