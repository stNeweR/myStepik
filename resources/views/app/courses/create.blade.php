@extends("app.layouts.main")

@section("title")
    Create course!
@endsection

@section("page")
    <x-container>
        <x-block class="w-1/2 mx-auto p-3">
            <form action="{{ route("courses.store") }}" method="post" class="flex flex-col gap-1">
                @method("post")
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="5" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2"></textarea>
                <label for="body">Body:</label>
                <textarea id="body" name="body" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2" rows="10"></textarea>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">
                <x-form-button>Create course!</x-form-button>
            </form>
        </x-block>
    </x-container>
@endsection
