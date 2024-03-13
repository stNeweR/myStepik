@props(['type', 'name'])

<label for="{{ $name }}">{{ $slot }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">
