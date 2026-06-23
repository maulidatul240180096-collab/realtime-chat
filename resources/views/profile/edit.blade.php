<link rel="stylesheet" href="/css/profile.css">

<x-app-layout>

<div class="profile-container">

    <!-- CARD PROFIL -->
    <div class="profile-card">

        <div class="profile-avatar">

            @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}">
            @else
                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
            @endif

        </div>

        <div class="profile-name">
            {{ Auth::user()->name }}
        </div>

        <div class="profile-email">
            {{ Auth::user()->email }}
        </div>

        <div class="profile-status">
            {{ Auth::user()->status ?? 'Halo, saya menggunakan ChatKu ❤️' }}
        </div>

    </div>


    <!-- EDIT PROFIL -->
    <div class="profile-section">

        <h2>Edit Profil</h2>

        <form method="POST"
              action="{{ route('profile.update') }}"
              enctype="multipart/form-data">

            @csrf
            @method('patch')

            <div class="form-group">

                <label>Foto Profil</label>

                <input type="file" name="photo">

            </div>


            <div class="form-group">

                <label>Nama</label>

                <input
                    type="text"
                    name="name"
                    value="{{ Auth::user()->name }}"
                >

            </div>


            <div class="form-group">

                <label>Status</label>

                <input
                    type="text"
                    name="status"
                    value="{{ Auth::user()->status }}"
                >

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ Auth::user()->email }}"
                >

            </div>

            <button class="save-btn">

                Simpan Profil

            </button>

        </form>

    </div>


    <!-- UBAH PASSWORD -->
    <div class="profile-section">

        <h2>Ubah Password</h2>

        <form method="POST" action="{{ route('password.update') }}">

            @csrf
            @method('put')

            <div class="form-group">

                <label>Password Lama</label>

                <input
                    type="password"
                    name="current_password"
                >

            </div>


            <div class="form-group">

                <label>Password Baru</label>

                <input
                    type="password"
                    name="password"
                >

            </div>


            <div class="form-group">

                <label>Konfirmasi Password Baru</label>

                <input
                    type="password"
                    name="password_confirmation"
                >

            </div>

            <button class="save-btn">

                Ubah Password

            </button>

        </form>

    </div>


    <!-- LOGOUT DAN HAPUS AKUN -->
    <div class="danger-zone">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="logout-btn">

                Logout

            </button>

        </form>


        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <button class="delete-btn">

                Hapus Akun

            </button>

        </form>

    </div>

</div>

</x-app-layout>