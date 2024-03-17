@props(['href'])

<form action="{{ $href }}" method="post" {{ $attributes->class("") }}>
    @method('delete')
    @csrf
    <button class="border border-rose-600 bg-rose-600 py-1 rounded px-2 hover:bg-transparent transition items-center justify-center">{{ $slot }}</button>
</form>
