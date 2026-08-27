@extends('layouts.app')

@section('content')

<section class="mt-20">
    <div
        x-data="{
            showLightbox: false,
            currentIndex: 0,
            items: {{ $items->toJson() }},
            openLightbox(index) {
                this.currentIndex = index;
                this.showLightbox = true;
            },
            nextItem() {
                this.currentIndex = (this.currentIndex + 1) % this.items.length;
            },
            prevItem() {
                this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
            },
            closeLightbox() {
                this.showLightbox = false;
                if (this.$refs.activeVideo) {
                    this.$refs.activeVideo.play();
                    this.$refs.activeVideo.currentTime = 0;
                }
            }
        }"
        @keydown.arrow-right.window="if(showLightbox) nextItem()"
        @keydown.arrow-left.window="if(showLightbox) prevItem()"
        @keydown.escape.window="closeLightbox()"
    >
        <div class="gap-4 md:gap-6 grid grid-cols-2 sm:grid-cols-3 bg-dark p-6">
            <template x-for="(item, index) in items" :key="index">
                <div class="relative group aspect-video overflow-hidden cursor-pointer" @click="openLightbox(index)">
                    
                    <template x-if="item.type === 'image'">
                        <img :src="item.image_url"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300"
                            :alt="item.title">
                    </template>

                    <template x-if="item.type === 'video'">
                        <div class="relative w-full h-full">
                            <video :src="item.video_url" 
                                preload="metadata" 
                                muted 
                                class="w-full h-full object-cover hover:scale-105 transition duration-300">
                            </video>
                        </div>
                    </template>

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
            style="display: none;"
            @click.self="closeLightbox()">

            <!-- Tombol Tutup (Samping Kanan Atas) -->
            <button @click="closeLightbox()"
                    class="top-6 right-6 z-50 absolute p-2 font-light text-white/70 hover:text-white text-4xl"
                    aria-label="Close lightbox">
                &times;
            </button>

            <!-- Tombol Previous (Kiri) -->
            <button @click="prevItem()"
                    class="top-1/2 left-4 z-50 absolute bg-white/10 hover:bg-white/20 p-3 rounded-full text-white transition -translate-y-1/2"
                    aria-label="Previous item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>

           <!-- Kontainer Utama Lightbox -->
            <div class="relative flex flex-col items-center w-full max-w-5xl max-h-[85vh]">
                
                <template x-if="items[currentIndex] && items[currentIndex].type === 'image'">
                    <img :src="items[currentIndex].image_url"
                        class="shadow-2xl rounded w-full max-w-full max-h-[80vh] object-contain"
                        :alt="items[currentIndex].title">
                </template>

                <template x-if="items[currentIndex] && items[currentIndex].type === 'video'">
                    <div class="w-full aspect-video">
                        <!-- Tambahkan x-ref="activeVideo" di sini -->
                        <video x-ref="activeVideo" controls autoplay class="w-full h-full rounded shadow-2xl object-contain bg-black" :src="items[currentIndex].video_url"></video>
                    </div>
                </template>

                <!-- Title Gallery / Video -->
                <div class="mt-3 font-semibold text-lg text-white text-center" x-text="items[currentIndex]?.title"></div>

                <!-- Indikator Angka (Contoh: 1 / 4) -->
                <div class="bg-black/40 mt-2 px-3 py-1 rounded-full font-medium text-white/80 text-sm">
                    <span x-text="currentIndex + 1"></span> / <span x-text="items.length"></span>
                </div>
            </div>

            <!-- Tombol Next (Kanan) -->
            <button @click="nextItem()"
                    class="top-1/2 right-4 z-50 absolute bg-white/10 hover:bg-white/20 p-3 rounded-full text-white transition -translate-y-1/2"
                    aria-label="Next item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>
</section>

@endsection