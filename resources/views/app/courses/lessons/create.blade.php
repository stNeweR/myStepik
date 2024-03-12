@extends("app.layouts.main")

@section("title")
    Create lesson!
@endsection

@section("page")
    <x-container>
        <x-block>
            <h1><b class="text-xl">Заголовок: </b>{{ $theme->title }}</h1>
            <p><b class="text-xl">Описание: </b>{{ $theme->description }}</p>
        </x-block>
        <x-block>
            <form action="{{ route("lessons.store", $theme->id) }}" method="post" class="flex flex-col gap-1">
                @csrf
                @method("post")
                <label for="title">Заголовок занятия:</label>
                <input type="text" name="title" id="title" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">
                <label for="body">Само занятие:</label>
                <textarea  name="body" id="body" rows="10" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2"></textarea>
                <x-form-button>Create lesson!</x-form-button>
            </form>
        </x-block>
    </x-container>
@endsection
