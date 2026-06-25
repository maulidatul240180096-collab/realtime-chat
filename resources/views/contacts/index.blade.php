<link rel="stylesheet" href="/css/contact.css">

<x-app-layout>

<div class="contact-container">
<div class="contact-header">

    <h1 class="contact-title">
        Kontak Anda
    </h1>

    <div class="contact-actions">

        <a href="{{ route('dashboard') }}"
           class="back-btn">

            ← Menu

        </a>

        <a href="{{ route('contacts.create') }}"
           class="add-contact-btn">

            + Tambah Kontak

        </a>

    </div>

</div>

    @foreach($contacts as $contact)

        <div class="contact-card">

            <div class="avatar">
                {{ strtoupper(substr($contact->contact_name,0,1)) }}
            </div>

            <div class="contact-info">

                <div class="contact-name">
                    {{ $contact->contact_name }}
                </div>

                <div class="contact-phone">
                    {{ $contact->contact_phone }}
                </div>

                @if($contact->registeredUser)

                    <div class="status online">
                        🟢 Pengguna Terdaftar
                    </div>

                    <a href="{{ route('chat.show',$contact->registeredUser->id) }}"
                       class="chat-btn">

                        Chat

                    </a>

                @else

                    <div class="status offline">
                        ⚫ Belum Terdaftar
                    </div>

                @endif

            </div>

        </div>

    @endforeach

</div>

</x-app-layout>