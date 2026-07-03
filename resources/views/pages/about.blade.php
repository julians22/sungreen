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
            <h4 class="text-xl leading-loose">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias placeat, doloribus ad, modi dolorem cumque dolore nobis adipisci esse unde reprehenderit recusandae necessitatibus, eum animi possimus illum eaque explicabo sint illo. Eum, eveniet! Dignissimos obcaecati repellendus non repudiandae, asperiores a ipsam fuga voluptates reprehenderit odit quo voluptatum doloribus! Ea consequuntur cum dolores totam non, quidem eaque optio, illo rem maxime praesentium! Cum saepe distinctio eaque aspernatur quia vero perferendis. Id aliquam enim culpa voluptate quaerat consequatur. Illum ab sapiente labore, aliquam quia eos accusantium ut voluptates id. Incidunt ipsa, cumque illo ducimus cupiditate mollitia recusandae nisi aspernatur inventore pariatur excepturi!
            </h4>
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
                <p class="font-semibold">lorem ipsum</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">+100</h3>
            </div>
        </div>

        <div class="flex md:flex-row flex-col justify-center items-center gap-x-3 gap-y-5 px-4">
            <!-- Image -->
            <div class="bg-dark rounded-2xl w-20 h-20 overflow-hidden"></div>

            <div>
                <p class="font-semibold">lorem ipsum</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">+100</h3>
            </div>
        </div>

        <div class="flex md:flex-row flex-col justify-center items-center gap-x-3 gap-y-5 px-4">
            <!-- Image -->
            <div class="bg-dark rounded-2xl w-20 h-20 overflow-hidden"></div>

            <div>
                <p class="font-semibold">lorem ipsum</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">+100</h3>
            </div>
        </div>

        <div class="flex md:flex-row flex-col justify-center items-center gap-x-3 gap-y-5 px-4">
            <!-- Image -->
            <div class="bg-dark rounded-2xl w-20 h-20 overflow-hidden"></div>

            <div>
                <p class="font-semibold">lorem ipsum</p>
                <!-- Counter -->
                <h3 class="font-bold text-dark text-2xl">+100</h3>
            </div>
        </div>







    </div>

    <!-- Description -->
    <div class="mx-auto mt-10 max-w-5xl container">
        <p class="text-dark text-lg text-center leading-loose">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem, at! Sint animi esse ut earum reiciendis perferendis incidunt ducimus cum modi architecto repudiandae minus corrupti eaque enim at sit velit delectus quasi nemo reprehenderit consequatur, saepe qui. Officia, quam minima.
        </p>
    </div>

</section>


@endsection
