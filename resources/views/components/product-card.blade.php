<div class="bg-white shadow-lg rounded-xl overflow-hidden">
    <img src="{{ $product->getFirstMediaUrl('thumbnail', 'thumb') }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="font-semibold text-dark text-lg">
            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
        </h3>
    </div>
</div>
