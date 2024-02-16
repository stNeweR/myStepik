@props(["error"])

@error($error)
    <p class="font-bold text-red-600">{{ $message }}</p>
@enderror
