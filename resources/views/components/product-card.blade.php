<a href="{{ route('products.show', $product->slug) }}" class="bg-white shadow-lg rounded-xl overflow-hidden transition-transform hover:scale-110 duration-500">
    <img src="{{ $product->getFirstMediaUrl('thumbnail', 'medium') }}" alt="{{ $product->name }}" class="w-full aspect-square object-cover">
    <div class="p-4">
        <h3 class="font-semibold text-dark text-lg">
            {{ $product->name }}
        </h3>
    </div>
</a>
