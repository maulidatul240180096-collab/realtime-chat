<link rel="stylesheet" href="/css/profile.css">

<x-app-layout>

<div class="profile-container">

    <div class="profile-card">

        <div class="profile-avatar">

    @if(auth()->user()->photo)

        <img src="{{ asset('storage/' . auth()->user()->photo) }}">

    @else

        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

    @endif

</div>

        <div class="profile-name">

            {{ auth()->user()->name }}

        </div>

        <div class="profile-phone">

            {{ auth()->user()->phone }}

        </div>

        <div class="profile-email">

            {{ auth()->user()->email }}

        </div>

        <div class="profile-bio">

    {{ auth()->user()->status ?? 'Halo, saya menggunakan ChatKu ❤️' }}

</div>
        <div class="profile-menu">

            <a href="{{ route('profile.edit.my') }}"
               class="menu-btn">

                 Edit Profil

            </a>

        </div>

    </div>

</div>

</x-app-layout>