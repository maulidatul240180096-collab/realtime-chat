<nav class="navbar">

    <a href="{{ route('dashboard') }}" class="nav-item chatku">
        💬 ChatKu
    </a>

    <a href="{{ route('contacts.index') }}" class="nav-item">
        👥 Kontak Saya
    </a>

    <a href="{{ route('profile.index') }}" class="nav-item">
        ⚙️ Profil Saya
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button class="logout-btn">
            🚪 Logout
        </button>
    </form>

</nav>