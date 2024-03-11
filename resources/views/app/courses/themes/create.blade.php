@extends("app.layouts.main")

@section("title")
    Create theme!
@endsection

@section("page")
    <x-container class="flex items-center justify-center">
        <x-block class="w-1/2">
            <form action="{{ route("courses.themes.store", $id) }}" method="post" class="flex flex-col p-1">
                @csrf
                @method("post")
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2" rows="5"></textarea>
                <button type="submit" class="border border-purple-600 py-1 rounded mt-2 hover:bg-purple-600 transition">Create theme</button>
            </form>
        </x-block>
    </x-container>
@endsection
