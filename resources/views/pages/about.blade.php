@extends('layouts.app')

@section('content')

<!-- Banner -->
<header class="relative">
    <img src="{{ asset('img/hero-about.png') }}" alt="Banner" class="w-full h-auto object-cover aspect-square md:aspect-auto">

    <div class="z-10 absolute inset-0 flex items-center mx-auto mt-20 container">
        <div class="mb-10 w-full max-w-[500px]">
            <span class="block text-shadow-lg/20 font-poppins font-bold text-white md:text-[100px] text-2xl md:text-left text-center md:leading-[92px]">
                TENTANG KAMI
            </span>
        </div>
    </div>
</header>

<!-- Content -->
<section class="py-10 md:py-20">

    <div class="gap-10 grid grid-cols-1 md:grid-cols-2 mx-auto px-2 md:px-0 container">
        <div>
            <h2 class="text-2xl font-bold">
                Menjadikan SunGreen sebagai salah satu pilihan paling bermanfaat dan menguntungkan bagi petani dalam budidaya agrikultur
            </h2>
            <p class="text-xl leading-loose mt-4">
                SunGreen hadir bukan sekadar sebagai produk, tapi juga sebagai mitra pertumbuhan bagi petani, peternak, pekebun, dan pembudidaya agrikultur Indonesia dengan menyediakan perlengkapan dan perlindungan yang kuat, tahan lama, dan modern untuk meningkatkan produktivitas, membuat pekerjaan lebih aman, dan mendorong efisiensi yang berkelanjutan.
                <br>
                Di tengah perubahan iklim, cuaca ekstrem, dan tuntutan hasil panen berkualitas tinggi, SunGreen berperan sebagai solusi perlindungan yang cerdas, membantu meningkatkan produktivitas, efisiensi, dan keberlanjutan sektor agrikultur lokal.
            </p>
        </div>

        <div>
            <img src="{{ asset('img/about-100.jpg') }}" alt="" class="rounded-xl w-full h-auto">
        </div>

    </div>

</section>

<section class="bg-gray-100 py-20">

    <x-section-title
        border-class="bg-dark"
    >
        <h2 class="text-dark section-title">Misi dan Nilai Kami</h2>
    </x-section-title>

    <div class="grid grid-cols-2 md:grid-cols-4 mx-auto mt-10 divide-x divide-dark container">

        <div class="flex md:flex-row flex-col justify-center items-center gap-x-3 gap-y-5 px-4">
            <!-- Image -->
            <div class="bg-dark rounded-2xl w-20 h-20 overflow-hidden"></div>

            <div>
                <p class="font-semibold">Petani Mitra</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">+100 Petani Binaan</h3>
            </div>
        </div>

        <div class="flex md:flex-row flex-col justify-center items-center gap-x-3 gap-y-5 px-4">
            <!-- Image -->
            <div class="bg-dark rounded-2xl w-20 h-20 overflow-hidden"></div>

            <div>
                <p class="font-semibold">Luas Lahan</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">+50 Hektar Greenhouse</h3>
            </div>
        </div>

        <div class="flex md:flex-row flex-col justify-center items-center gap-x-3 gap-y-5 px-4">
            <!-- Image -->
            <div class="bg-dark rounded-2xl w-20 h-20 overflow-hidden"></div>

            <div>
                <p class="font-semibold">Mitra Bisnis</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">+100 Klien & Distributor</h3>
            </div>
        </div>

        <div class="flex md:flex-row flex-col justify-center items-center gap-x-3 gap-y-5 px-4">
            <!-- Image -->
            <div class="bg-dark rounded-2xl w-20 h-20 overflow-hidden"></div>

            <div>
                <p class="font-semibold">100% Bebas Pestisida Berbahaya</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">100% Bebas Pestisida Berbahaya</h3>
            </div>
        </div>







    </div>

    <!-- Description -->
    <div class="mx-auto mt-10 max-w-5xl container">
        <p class="text-dark text-lg text-center leading-loose">
            Di tengah perubahan iklim, cuaca ekstrem, dan tuntutan hasil panen berkualitas tinggi, SunGreen berperan sebagai solusi perlindungan yang cerdas, membantu meningkatkan produktivitas, efisiensi, dan keberlanjutan sektor agrikultur lokal.
        </p>
    </div>

</section>


@endsection
