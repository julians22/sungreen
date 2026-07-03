@extends('layouts.app')

@section('content')

<section class="mt-20">
    <div
        x-data="{
            showLightbox: false,
            currentIndex: 0,
            images: {{ $galleries->pluck('image_url')->toJson() }},
            openLightbox(index) {
                this.currentIndex = index;
                this.showLightbox = true;
            },
            nextImage() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            },
            prevImage() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            }
        }"
        @keydown.arrow-right.window="if(showLightbox) nextImage()"
        @keydown.arrow-left.window="if(showLightbox) prevImage()"
        @keydown.escape.window="showLightbox = false"
    >
        <div class="gap-4 md:gap-6 grid grid-cols-2 sm:grid-cols-3 bg-dark p-6">
            <template x-for="(image, index) in images" :key="index">
                <div class="aspect-video overflow-hidden">
                    <img :src="image"
                        @click="openLightbox(index)"
                        class="w-full h-full object-cover hover:scale-105 transition duration-300 cursor-pointer"
                        alt="Gallery Thumbnail">
                </div>
            </template>
        </div>


        <!-- Overlay Lightbox -->
        <div x-show="showLightbox"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="z-50 fixed inset-0 flex justify-center items-center bg-black/90 p-4 animate-none select-none"
            style="display: none;">

            <!-- Tombol Tutup (Samping Kanan Atas) -->
            <button @click="showLightbox = false"
                    class="top-6 right-6 z-50 absolute p-2 font-light text-white/70 hover:text-white text-4xl"
                    aria-label="Close lightbox">
                &times;
            </button>

            <!-- Tombol Previous (Kiri) -->
            <button @click="prevImage()"
                    class="top-1/2 left-4 z-50 absolute bg-white/10 hover:bg-white/20 p-3 rounded-full text-white transition -translate-y-1/2"
                    aria-label="Previous image">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Kontainer Utama Gambar -->
            <div class="relative flex flex-col items-center w-full max-w-5xl max-h-[85vh]">
                <img :src="images[currentIndex]"
                    class="shadow-2xl rounded w-full max-w-full max-h-[80vh] object-contain"
                    alt="Enlarged view">

                <!-- Indikator Angka (Contoh: 1 / 4) -->
                <div class="bg-black/40 mt-3 px-3 py-1 rounded-full font-medium text-white/80 text-sm">
                    <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
                </div>
            </div>

            <!-- Tombol Next (Kanan) -->
            <button @click="nextImage()"
                    class="top-1/2 right-4 z-50 absolute bg-white/10 hover:bg-white/20 p-3 rounded-full text-white transition -translate-y-1/2"
                    aria-label="Next image">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>


</section>


@endsection
