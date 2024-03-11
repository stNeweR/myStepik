@extends("app.layouts.main")

@section("title")
    Edit course info!
@endsection

@section("page")
    <x-container>
        <x-block class="w-1/2 mx-auto">
            <form action="{{ route("courses.update", $course->id) }}" method="post" class="flex flex-col gap-1">
                @method("put")
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="bg-slate-900 rounded focus:bg-slate-950 outline-none py-1 px-2" value="{{ $course->title }}">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="5" class="bg-slate-900 rounded focus:bg-slate-950 outline-none py-1 px-2">{{ $course->description }}</textarea>
                <label for="body">Body:</label>
                <textarea id="body" name="body" class="bg-slate-900 focus:bg-slate-950 rounded outline-none py-1 px-2" rows="10">{{ $course->body }}</textarea>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="bg-slate-900 rounded focus:bg-slate-950 outline-none py-1 px-2" value="{{ $course->price }}">
                <button class="border border-purple-600 py-1 rounded mt-2 hover:bg-purple-600 transition" type="submit">Edit!</button>
            </form>
        </x-block>
    </x-container>
@endsection
