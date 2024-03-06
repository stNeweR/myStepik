@props(["href"])

<a href="{{ $href }}" {{ $attributes->class("hover:text-purple-600 hover:border-b border-purple-600 transition max-w-max")}}>{{ $slot }}</a>
