@extends('layouts.app')

@section('content')

<!-- Product Detail -->
<section class="mt-20">

    <div class="mx-auto px-2 md:px-0 py-10 md:py-20 container">

        <div class="gap-0 md:gap-10 grid grid-cols-12">
            <div class="col-span-12 md:col-span-5">
    <!-- Main Slider -->
    <section id="main-slider" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($product->getMedia('thumbnail') as $media)
                    <li class="splide__slide">
                        <div class="aspect-square">
                            <img src="{{ $media->getUrl('thumb') }}" alt="{{ $product->name }}" class="shadow-lg rounded-lg w-full h-full object-cover">
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
<!-- Thumbnail Slider (Pagination) -->
<section id="thumbnail-slider" class="splide">
    <div class="splide__track !h-[90px]">
        <ul class="splide__list !h-[90px] items-center">
            @foreach ($product->getMedia('thumbnail') as $media)
                <li class="splide__slide !w-[80px] !h-[80px] cursor-pointer opacity-60 hover:opacity-100 transition duration-200 [&.is-active]:opacity-100 [&.is-active]:ring-2 [&.is-active]:ring-primary flex-shrink-0">
                    <div class="w-full h-full rounded-lg overflow-hidden">
                        <img src="{{ $media->getUrl('thumb') }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
</div>
            <div class="col-span-12 md:col-span-7">
                <div class="divide-y-2 divide-dark">

                    <div class="py-6">
                        <h1 class="font-semibold text-primary text-4xl">{{ $product->name }}</h1>
                    </div>

                    <div class="py-6">
                        <h2 class="font-semibold text-dark text-2xl">Deskripsi Produk</h2>
                        <p class="mt-2 text-dark/80">{{ $product->description }}</p>
                    </div>

                    <div class="py-6">
                        <h2 class="font-semibold text-dark text-2xl">Kualitas Produk</h2>
                        <p class="mt-2 text-dark/80">{{ $product->additional_info['quality'] ?? 'N/A' }}</p>
                    </div>

                    <div class="py-6">
                        <h2 class="font-semibold text-dark text-2xl">Fitur Produk</h2>
                        <p class="mt-2 text-dark/80">{{ $product->additional_info['features'] ?? 'N/A' }}</p>
                    </div>

                    <div class="py-6">

                        <!-- CTA Featured product -->
                        <div class="flex gap-4">
                            <a href="#produk-serupa"
                                class="bg-primary hover:bg-primary/80 px-6 py-3 rounded-lg text-white transition duration-300">
                                Produk Serupa
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="produk-serupa">

            @if ($product->relatedProducts->isNotEmpty())
                <div class="mt-10 md:mt-28">
                    <x-section-title
                        border-class="bg-dark"
                    >
                        <h2 class="text-dark section-title">Produk Serupa</h2>
                    </x-section-title>

                    <div class="gap-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-auto mt-10 container">
                        @foreach ($product->relatedProducts as $relatedProduct)
                            <x-product-card :product="$relatedProduct" />
                        @endforeach
                    </div>
                </div>
            @else
                <div class="mt-10 md:mt-28">
                    <x-section-title
                        border-class="bg-dark"
                    >
                        <h2 class="text-dark section-title">Produk Serupa</h2>
                    </x-section-title>

                    <p class="mt-4 text-dark/80">Tidak ada produk serupa yang tersedia.</p>
                </div>
            @endif
        </div>

    </div>

</section>

@endsection
