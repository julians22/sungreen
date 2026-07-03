@extends('layouts.app')

@section('content')

<section class="mt-20 py-10 md:py-20">
    <x-section-title
        border-class="bg-dark"
    >
        <h2 class="text-dark section-title">Hubungi Kami</h2>
    </x-section-title>


    <div class="grid grid-cols-5 mx-auto px-2 md:px-0 container">

        <!-- Formulir Kontak -->
        <div class="col-span-5 md:col-span-3 md:col-start-2">
            <form action="{{ route('contact.submit') }}" method="POST" class="bg-white shadow-lg drop-shadow-dark/50 p-4">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label for="name" class="block mb-2 font-semibold text-dark">Nama</label>
                    <input type="text" name="name" id="name" class="px-3 py-2 border border-gray-300 focus:border-primary/40 rounded focus:outline-none focus:ring w-full" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block mb-2 font-semibold text-dark">Email</label>
                    <input type="email" name="email" id="email" class="px-3 py-2 border border-gray-300 focus:border-primary/40 rounded focus:outline-none focus:ring w-full" required>
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label for="phone" class="block mb-2 font-semibold text-dark">Telepon</label>
                    <input type="text" name="phone" id="phone" class="px-3 py-2 border border-gray-300 focus:border-primary/40 rounded focus:outline-none focus:ring w-full" required>
                </div>

                <!-- Pesan -->
                <div class="mb-4">
                    <label for="message" class="block mb-2 font-semibold text-dark">Pesan</label>
                    <textarea name="message" id="message" rows="5" class="px-3 py-2 border border-gray-300 focus:border-primary/40 rounded focus:outline-none focus:ring w-full" required></textarea>
                </div>

                <button type="submit" class="bg-dark hover:bg-dark/80 px-6 py-2 rounded font-semibold text-white transition duration-300">Kirim Pesan</button>
            </form>
        </div>
    </div>



</section>





@endsection
