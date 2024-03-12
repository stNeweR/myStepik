@props(["href"])

<a href="{{ $href }}" {{ $attributes->class("border border-purple-600 py-1 rounded px-2 hover:bg-purple-600 transition") }} >
    {{ $slot }}
</a>
