@extends("admin.layout.main")

@section("page")
    <x-container>
        <x-block>
            <form action="{{ route("admin.courses.update", $course->id) }}" method="POST" class="" >
                @method("put")
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="title" class="font-bold">First_name:</label>
                    <input class="bg-transparent border-b outline-none"  type="text" name="title" value="{{ $course->title}}">
                    <x-error error="title"></x-error>
                    <label for="price" class="font-bold">Price:</label>
                    <input class="bg-transparent border-b outline-none"  type="number" name="price" value="{{ $course->price }}">
                    <label for="description" class="font-bold">Description:</label>
                    <textarea type="text" class="bg-transparent border outline-none" rows=10 name="description">{{ $course->description}}</textarea>
                </div>
                <button type="submit">Edit!</button>
            </form>
        </x-block>
    </x-container>
@endsection
