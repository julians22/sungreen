<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('plugin-scripts')

</head>
<body
    x-data="{ scrolledPage: false, open: false }"
    @scroll.window="scrolledPage = (window.pageYOffset > 300)"
    @keydown.escape.window="open = false"
    :class="{ 'overflow-hidden': open }"
>

    <nav class="nav {{ request()->routeIs('home') || request()->routeIs('about') ? 'transparent' : '' }}" :class="{ 'scrolled': scrolledPage }">
        <div class="nav-container">

            <!-- Logo -->
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="h-8 md:h-12">
            </a>

            <!-- Menu -->
            <div
                x-data="{ activeIndex: null, currentActive: null}"
                x-init="
                    $nextTick(() => {
                        {{-- timeout --}}
                        setTimeout(() => {
                            const activeItem = $el.querySelector('.nav-item.active');
                            if (activeItem) {
                                activeIndex = Array.from($el.querySelectorAll('.nav-item')).indexOf(activeItem);
                                currentActive = activeItem;

                                const indicator = $refs.indicator;
                                indicator.style.left = activeItem.offsetLeft + 'px';
                                indicator.style.width = activeItem.offsetWidth + 'px';
                            }
                        }, 250);
                    });

                    $watch('activeIndex', value => {
                        const indicator = $refs.indicator;
                        const activeItem = $el.querySelectorAll('.nav-item')[value];
                        if (activeItem) {
                            indicator.style.left = activeItem.offsetLeft + 'px';
                            indicator.style.width = activeItem.offsetWidth + 'px';
                        }
                    });
                "
                class="hidden md:flex nav-menu"
                @mouseleave="activeIndex = currentActive ? Array.from($el.querySelectorAll('.nav-item')).indexOf(currentActive) : null"
                >
                <a @mouseover="activeIndex = 0" @click="currentActive = $el" href="{{ route('home') }}" class="nav-item {{ activeRoute('home') }}">Home</a>
                <a @mouseover="activeIndex = 1" @click="currentActive = $el" href="{{ route('about') }}" class="nav-item {{ activeRoute('about') }}">Profil</a>
                <a @mouseover="activeIndex = 2" @click="currentActive = $el" href="{{ route('products') }}" class="nav-item {{ activeRoute('products') }}">Produk</a>
                <a @mouseover="activeIndex = 3" @click="currentActive = $el" href="{{ route('gallery') }}" class="nav-item {{ activeRoute('gallery') }}">Galeri</a>
                <a @mouseover="activeIndex = 4" @click="currentActive = $el" href="{{ route('contact') }}" class="nav-item {{ activeRoute('contact') }}">Hubungi Kami</a>

                <span
                    x-ref="indicator"
                    x-cloak
                    x-show="activeIndex !== null"
                    style="width: var(--nav-item-width)"
                    class="-top-4 left-0 absolute bg-secondary rounded-xl h-1 transition-all duration-300"></span>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="md:hidden flex nav-toggle" @click="open = !open">
                <span :class="{ 'rotate-45 translate-y-1.5': open }"></span>
                <span :class="{ 'opacity-0': open }"></span>
                <span :class="{ '-rotate-45 -translate-y-1.5': open }"></span>
            </div>
        </div>
    </nav>

    <!-- Mobile Overlay Menu -->
    <div
        x-cloak
        x-show="open"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="md:hidden top-0 right-0 bottom-0 left-0 z-40 fixed bg-dark/95 backdrop-blur-sm"
        @click.self="open = false"
    >
        <div class="flex flex-col gap-6 px-6 pt-28 min-h-full text-center">
            <a href="{{ route('home') }}" class="font-bold text-white text-xl uppercase tracking-wide" @click="open = false">Home</a>
            <a href="{{ route('about') }}" class="font-bold text-white text-xl uppercase tracking-wide" @click="open = false">Profil</a>
            <a href="{{ route('products') }}" class="font-bold text-white text-xl uppercase tracking-wide" @click="open = false">Produk</a>
            <a href="{{ route('gallery') }}" class="font-bold text-white text-xl uppercase tracking-wide" @click="open = false">Galeri</a>
            <a href="{{ route('contact') }}" class="font-bold text-white text-xl uppercase tracking-wide" @click="open = false">Hubungi Kami</a>
        </div>
    </div>

    <main>
        @yield('content')
    </main>


    <footer class="flex flex-col items-center bg-dark px-2 md:px-0 py-8">
        <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="mb-4 max-w-[200px] md:max-w-full md:h-18">
        <p class="text-white text-sm md:text-left text-center">&copy; {{ date('Y') }} Sungreen. All Rights Reserved. Design by designcub3.com</p>
    </footer>

</body>
</html>
