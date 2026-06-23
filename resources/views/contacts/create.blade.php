<link rel="stylesheet" href="/css/contact.css">

<x-app-layout>

<div class="contact-form-container">

    <h2 class="contact-title">
        👥 Tambah Kontak
    </h2>

    <form action="{{ route('contacts.store') }}" method="POST">

        @csrf

        <div class="input-group">

            <label>Nama Kontak</label>

            <input
                type="text"
                name="contact_name"
                placeholder="Masukkan nama kontak">

        </div>

        <div class="input-group">

            <label>Nomor HP</label>

            <input
                type="text"
                name="contact_phone"
                placeholder="Masukkan nomor HP">

        </div>

        <div class="button-group">

    <a href="{{ route('contacts.index') }}"
       class="back-btn">

        ← Kembali

    </a>

    <button class="save-btn">
        Simpan
    </button>

</div>

    </form>

</div>

</x-app-layout>