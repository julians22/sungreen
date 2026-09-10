<div class="bg-white shadow-lg rounded-xl overflow-hidden ">
    <img src="{{ $product->getFirstMediaUrl('thumbnail', 'medium') }}" alt="{{ $product->name }}" class="w-full aspect-square object-cover">
    <div class="p-4">
        <h3 class="font-semibold text-dark text-lg">
            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
        </h3>
    </div>
</div>
