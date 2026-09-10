@props([
    'bordered' => true
])

<div
    class="relative flex flex-col justify-center items-center gap-y-3 mx-auto w-full lg:w-max text-center md:mt-10"
>
    {{ $slot }}

    @if ($bordered)
        <span
            {{ $attributes->merge(['class' => 'lg:flex-auto mx-auto w-4 lg:w-12 h-1 transition-all ease-linear '. $borderClass]) }}></span>
    @endif

</div>
