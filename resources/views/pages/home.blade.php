@extends('layouts.app')

@push('plugin-scripts')
    @vite(['resources/js/splide.js'])
@endpush

@section('content')

<!-- Banner -->
<header class="relative">
    <img src="{{ asset('img/banner.png') }}" alt="Banner" class="w-full h-auto object-cover aspect-square md:aspect-auto">

    <div class="z-10 absolute inset-0 flex justify-center items-center">
        <div class="mx-auto mb-20 w-full max-w-[960px]">
            <span class="block text-shadow-lg/20 mt-10 md:mt-0 font-poppins font-bold text-white md:text-[100px] text-3xl text-center md:leading-[92px]">
                Melindungi <br> & Merawat Alam
            </span>
        </div>
    </div>
</header>

<section class="relative bg-dark">

    <div class="md:-top-32 md:absolute inset-0 py-10 md:py-0 pointer-events-none">
        <div class="flex md:flex-row flex-col md:justify-between items-center gap-y-10 md:gap-y-0 mx-auto md:mb-12 px-2 md:px-0 w-full max-w-[960px]">
            <div x-data="{ shown: false }" x-intersect.full="shown = true" class="flex flex-col space-y-2 bg-secondary p-10 rounded-full size-64">
                <img x-show="shown" x-transition src="{{ asset('img/icons/icon-1.png') }}" alt="" class="mx-auto aspect-square basis-1/4">
                <h2 x-show="shown" x-transition class="font-bold text-primary text-base text-center">MENINGKATKAN KESUKSESAN PERTUMBUHAN TANAMAN</h2>
            </div>
            <div x-data="{ shown: false }" x-intersect.full="shown = true" class="flex flex-col space-y-2 bg-secondary p-10 rounded-full size-64">
                <img x-show="shown" x-transition src="{{ asset('img/icons/icon-2.png') }}" alt="" class="mx-auto aspect-square basis-1/4">
                <h2 x-show="shown" x-transition class="font-bold text-primary text-base text-center">MUTU KUALITAS PRODUK & PELAYANAN TERBAIK</h2>
            </div>
            <div x-data="{ shown: false }" x-intersect.full="shown = true" class="flex flex-col space-y-2 bg-secondary p-10 rounded-full size-64">
                <img x-show="shown" x-transition src="{{ asset('img/icons/icon-3.png') }}" alt="" class="mx-auto aspect-square basis-1/4">
                <h2 x-show="shown" x-transition class="font-bold text-primary text-base text-center">PAKET HARGA YANG BERSAHABAT UNTUK PARTNER UMKM</h2>
            </div>
        </div>
    </div>

    <div class="mx-auto px-2 md:px-0 pt-4 md:pt-48 pb-12 w-full max-w-[960px]">

        <h1 class="font-bold text-white text-4xl text-center">Kami Berdedikasi Untuk Membantu Kesuksesan Usaha Pertanian Anda</h1>

        <p class="mt-6 text-white text-lg text-center">
            Sungreen adalah penyedia plastik UV berkualitas tinggi untuk greenhouse, dirancang untuk melindungi tanaman dari paparan sinar UV berlebih sekaligus menjaga kelembapan dan suhu ideal. Dengan material yang kuat, tahan lama, dan dirancang khusus untuk kebutuhan pertanian modern, Sungreen membantu Anda merawat tanaman agar tumbuh lebih sehat, produktif, dan terlindungi sepanjang musim.
        </p>
    </div>


</section>

<!-- Products -->
<section class="bg-white mx-auto px-2 md:px-0 py-8 container">
    <x-section-title
        border-class="bg-dark"
    >
        <h2 class="text-dark section-title">Produk Kami</h2>
    </x-section-title>

    <div>
        <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-10">
            @foreach ($products as $product)
                <div class="flex flex-col bg-white shadow-lg rounded-lg aspect-square overflow-hidden">
                    <img src="{{ $product->getFirstMediaUrl('thumbnail', 'medium') }}" alt="{{ $product->name }}" class="w-full h-75 md:h-48 object-cover">
                    <div class="flex flex-col flex-1 justify-between p-4">
                        <h3 class="mb-2 font-bold text-dark text-lg">{{ $product->name }}</h3>
                        <div class="mb-4 text-dark text-sm">{!! Str::limit($product->description, 100) !!}</div>
                        {{-- <a href="{{ route('products.show', $product) }}" class="inline-block bg-dark hover:bg-gray-800 mt-auto px-4 py-2 rounded text-white transition">Lihat Detail</a> --}}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center">
            <a href="{{ route('products') }}" class="inline-block bg-secondary hover:bg-secondary/35 mt-10 px-6 py-3 rounded-3xl font-bold text-primary transition">Lihat Semua Produk</a>
        </div>
    </div>

</section>

<!-- Featured Product -->
<section class="bg-white pb-8 pt-4">
    <x-section-title
        border-class="bg-dark"
    >
        <h2 class="text-dark section-title">Produk Unggulan</h2>
    </x-section-title>

    <div class="grid grid-cols-1 md:grid-cols-2 mt-10 md:h-screen overflow-hidden">
        <div>
            <img src="{{ asset('img/featrued-prod-alternate-2.png') }}" alt="Featured Product" class=" w-full h-full">
        </div>

        <div class="space-y-6 bg-secondary p-6 3xl:pt-24 md:pl-20">
            <img src="{{ asset('img/logo-black.png') }}" alt="" class="mb-4 h-12">
            <h3 class="font-bold text-in-secondary text-6xl">Plastic UV <br> <span class="text-base">200 Micron</span></h3>
            <div class="space-y-6 max-w-5/6 text-dark text-lg 2xl:text-lg leading-relaxed tracking-normal">

                <p>Sungreen Plastic UV terbuat dari material tahan lama dengan perlindungan UV, mampu menstabilkan suhu, mengurangi panas berlebih, dan menjaga kelembapan sehingga mendukung pertumbuhan tanaman sepanjang musim.</p>
                <P><strong>Sungreen Plastic UV adalah plastik greenhouse berkualitas tinggi yang dirancang untuk:</strong></P>
                <ul class="list-disc list-inside text-lg text-black">
                    <li>Melindungi tanaman dari radiasi UV berlebih</li>
                    <li>Menstabilkan suhu dan kelembapan dalam greenhouse</li>
                    <li>Menjaga penerimaan cahaya yang optimal agar tanaman tumbuh sehat</li>
                </ul>

                <p class="mt-2 text-black">
                    Dengan perlindungan dan fitur dirancang khusus, Sungreen Plastic UV membantu menciptakan lingkungan tumbuh yang ideal dan produktif bagi berbagai jenis tanaman.
                </p>

                <a href="https://wa.me/085776582728" class="btn-green 3xl:mt-8 inline-flex items-center gap-2">
    Hubungi Kami
    @svg('bi-whatsapp', 'w-6 h-6')
</a>
            </div>
        </div>
    </div>
</section>

<!-- Product Features -->
<section class="bg-white pb-10 md:pb-24">
    <x-section-title
        border-class="bg-dark"
    >
        <h2 class="text-dark section-title">Fitur & Spesifikasi</h2>
    </x-section-title>


    <div class="mx-auto mt-10 md:mt-24 px-2 md:px-0 max-w-4xl container">
        <div class="relative p-2 md:p-8">
            <img src="{{ asset('img/specs.png') }}" class="mx-auto w-full max-w-[600px] h-auto" alt="">

            {{-- Specs Key around the image --}}
            {{-- 8 keys orbiting in a wider circle --}}
            {{-- ver desktop --}}
            <ul class="hidden md:block absolute inset-0">
                {{-- 1. Top Center --}}
                <li class="top-[0%] left-[50%] specs-item">
                    <p class="font-bold text-xs">
                        <b>UKURAN:</b> <br>
                        <span class="font-normal">Panjang 50 Meter & Lebar Variatif</span>
                    </p>
                </li>

                {{-- 2. Top Right --}}
                <li class="top-[18%] left-[100%] specs-item">
                    <p class="font-bold text-xs">
                        <b>DAYA TAHAN:</b> <br>
                        <span class="font-normal">Tahan 5 Tahun Penggunaan</span>
                    </p>
                </li>

                {{-- 3. Middle Right --}}
                <li class="top-[50%] left-[95%] specs-item hidden">
                    <p class="font-bold text-xs">
                        <b>TRANSMISI CAHAYA:</b> <br>
                        <span class="font-normal">± 80–90 %</span>
                    </p>
                </li>

                {{-- 4. Bottom Right --}}
                <li class="top-[82%] left-[100%] specs-item">
                    <p class="font-bold text-xs">
                        <b>KETERSEDIAAN:</b> <br>
                        <span class="font-normal">
                            Tersedia di toko pertanian dan perkebunan terdekat
                        </span>
                    </p>
                </li>

                {{-- 5. Bottom Center --}}
                <li class="top-[100%] left-[50%] specs-item">
                    <p class="font-bold text-xs">
                        <b>PEMASANGAN:</b> <br>
                        <span class="font-normal">Sangat Elastis Tanpa Perlu Dijemur Terlebih Dahulu</span>
                    </p>
                </li>

                {{-- 6. Bottom Left --}}
                <li class="top-[82%] left-[6%] specs-item">
                    <p class="font-bold text-xs">
                        <b>HARGA:</b> <br>
                        <span class="font-normal">
                            Bersahabat untuk Kualitas Terbaik
                        </span>
                    </p>
                </li>

                {{-- 7. Middle Left --}}
                <li class="top-[50%] left-[5%] specs-item hidden">
                    <p class="font-bold text-xs">
                        <b>LEBAR MAX:</b> <br>
                        <span class="font-normal">
                            3 – 6 meter
                        </span>
                    </p>
                </li>

                {{-- 8. Top Left --}}
                <li class="top-[18%] left-[6%] specs-item">
                    <p class="font-bold text-xs">
                        <b>KETEBALAN:</b> <br>
                        <span class="font-normal">
                            200 Mikron
                        </span>
                    </p>
                </li>
            </ul>

            {{-- ver mobile --}}
            <ul class="md:hidden gap-4 grid grid-cols-2">
                <li class="specs-item">
                    <p class="font-bold text-xs">
                        <b>KETEBALAN:</b> <br>
                        <span class="font-normal">200 Mikron</span>
                    </p>
                </li>
                <li class="specs-item">
                    <p class="font-bold text-xs">
                        <b>DAYA TAHAN:</b> <br>
                        <span class="font-normal">Tahan 5 Tahun Penggunaan</span>
                    </p>
                </li>
                <li class="specs-item">
                    <p class="font-bold text-xs">
                        <b>PEMASANGAN:</b> <br>
                        <span class="font-normal">Sangat Elastis Tanpa Perlu Dijemur Terlebih Dahulu</span>
                    </p>
                </li>
                <li class="specs-item">
                    <p class="font-bold text-xs">
                        <b>HARGA:</b> <br>
                        <span class="font-normal">
                            Bersahabat untuk Kualitas Terbaik
                        </span>
                    </p>
                </li>
                <li class="specs-item">
                    <p class="font-bold text-xs">
                        <b>KETERSEDIAAN:</b> <br>
                        <span class="font-normal">Tersedia di toko pertanian dan perkebunan terdekat</span>
                    </p>
                </li>
                <li class="specs-item">
                    <p class="font-bold text-xs">
                        <b>UKURAN:</b> <br>
                        <span class="font-normal">
                            Panjang 50 Meter & Lebar Variatif
                        </span>
                    </p>
                </li>
                {{-- hide sementara --}}
                <li class="specs-item hidden">
                    <p class="font-bold text-xs">
                    <b>LEBAR MAX:</b> <br>
                    <span class="font-normal">
                        3 – 6 meter
                    </span>
                </li>
                <li class="specs-item hidden">
                    <p class="font-bold text-xs">
                        <b>KETEBALAN:</b> <br>
                        <span class="font-normal">
                            200 Mikron
                        </span>
                    </p>
                </li>

            </ul>
        </div>
    </div>

</section>


<!-- Why choose us -->
<section
    style="--tw-bg-image: url({{ asset('img/why-background.png') }});"
    class="bg-(image:--tw-bg-image) bg-cover bg-center py-8 min-h-96">

    <div class="mx-auto px-2 md:px-0 container">

        <x-section-title
            border-class="bg-white"
        >
            <h2 class="text-white section-title">Kenapa Memilih Sungreen Plastic UV?</h2>
        </x-section-title>

        <div class="gap-x-8 gap-y-6 grid grid-cols-1 md:grid-cols-4 mt-20 mb-20">

            <div class="flex flex-col items-center space-y-4">

                <img class="mx-auto w-28 aspect-square" src="{{ asset('img/icons/why-icons-1.png') }}" alt="">

                <div class="max-w-4/5">
                    <p class="font-bold text-white text-center">
                        Memberi perlindungan UV maksimal dan memperpanjang umur greenhouse
                    </p>
                </div>

            </div>
            <div class="flex flex-col items-center space-y-4">

                <img class="mx-auto w-28 aspect-square" src="{{ asset('img/icons/why-icons-2.png') }}" alt="">

                <div class="max-w-4/5">
                    <p class="font-bold text-white text-center">
                        Mempertahankan kondisi tumbuh ideal suhu, kelembapan, dan cahaya
                    </p>
                </div>

            </div>

            <div class="flex flex-col items-center space-y-4">

                <img class="mx-auto w-28 aspect-square" src="{{ asset('img/icons/why-icons-3.png') }}" alt="">

                <div class="max-w-4/5">
                    <p class="font-bold text-white text-center">
                        Mengurangi biaya operasional dengan efisiensi penggunaan energi & perawatan
                    </p>
                </div>

            </div>
            <div class="flex flex-col items-center space-y-4">

                <img class="mx-auto w-28 aspect-square" src="{{ asset('img/icons/why-icons-4.png') }}" alt="">

                <div class="max-w-4/5">
                    <p class="font-bold text-white text-center">
                        Memberi fleksibilitas bagi petani atau pengusaha greenhouse dari skala kecil hingga besar
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- Testimonials -->
<section
    style="--tw-bg-image: url({{ asset('img/testi-background.png') }});"
    class="bg-(image:--tw-bg-image) bg-cover bg-center py-8 ">
    <x-section-title
        border-class="bg-white"
    >
        <h2 class="text-white section-title">Testimoni Pelanggan</h2>
    </x-section-title>

    <div class="mx-auto mt-4 md:mt-10 px-2 md:px-0 container">
        <div class="h-[620px] splide" aria-label="Testimonials">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($reviews as $review)
                        <li class="splide__slide">
                            <div class="flex flex-col justify-center h-full">
                                <div class="bg-white mx-auto px-4 lg:px-10 py-8 lg:py-14 rounded-lg w-full">
                                    <div class="flex flex-col justify-between items-center space-y-4 md:h-96">
                                        {{-- Stars --}}
                                        <div class="flex space-x-2">

                                            @for ($i = 0; $i < $review->rating; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-8 h-8 text-yellow-400">
                                                    <path d="M12 .587l3.668 7.568L24 9.423l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.27 0 9.423l8.332-1.268z"/>
                                                </svg>
                                            @endfor

                                        </div>
                                        <p class="text-dark text-xs max-w-4/5 md:text-lg text-center italic">"{{ $review->comment }}"</p>
                                        <p class="font-bold text-base md:text-2xl"><span class="text-primary">-{{ $review->name }},</span> {{ $review->after_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</section>

<!-- FAQ -->
{{-- Sementara di hide dulu --}}
<section class="bg-white pt-8 pb-14 hidden">
    <x-section-title
        border-class="bg-dark"
    >
        <h2 class="text-dark section-title">FAQ</h2>
    </x-section-title>

    <div x-data="{ activeIndex: 0}" class="mx-auto px-2 md:px-0 container">
        <div class="mt-10">
            @foreach ($faqs as $faq)
            <div class="faq-item" :class="{ 'active': activeIndex === {{ $loop->index }} }" >
                <h3 class="faq-title" @click="activeIndex = activeIndex === {{ $loop->index }} ? null : {{ $loop->index }}">{{ $faq->question }}</h3>
                <div class="faq-content translate-y-4" x-show="activeIndex === {{ $loop->index }}" x-collapse.duration.500ms>
                    {!! $faq->answer !!}
                </div>

                <span class="action">
                    <x-heroicon-o-plus class="size-7 text-dark plus"
                        @click="activeIndex = activeIndex === {{ $loop->index }} ? null : {{ $loop->index }}"
                    />
                    <x-heroicon-o-minus class="size-7 text-dark minus"
                        @click="activeIndex = activeIndex === {{ $loop->index }} ? null : {{ $loop->index }}"
                    />
                </span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Siap Membantu Kesuksesan Usaha Pertanian Anda -->
<section
    style=" --tw-bg-image: url({{ asset('img/bg-contact-real.png') }});"
    class="bg-(image:--tw-bg-image) bg-cover bg-top pt-2 md:pt-8 aspect-square md:aspect-auto min-h-auto md:min-h-screen ">

    <x-section-title
        border-class="bg-white"
    >
        <h2 class="text-white text-center md:text-4xl section-title">Siap Membantu Kesuksesan Usaha Pertanian Anda</h2>
    </x-section-title>

</section>



@endsection
