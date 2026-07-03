@extends('layouts.app')

@section('content')

<section class="mt-20 py-10 md:py-20">
    <x-section-title
        border-class="bg-dark"
    >
        <h2 class="text-dark section-title">Produk Kami</h2>
    </x-section-title>

    <div class="gap-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mx-auto mt-10 px-2 md:px-0 container container">
        @foreach ($products as $product)
        <x-product-card :product="$product" />
        @endforeach
    </div>

</section>



@endsection
