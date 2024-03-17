@extends('app.layouts.main')


@section('title')
    {{ $theme->title }} | Edit
@endsection


@section('page')

    <x-container class="flex items-center justify-center">
        <x-block class="w-1/2 p-3">
            <form action="{{ route('courses.themes.update', $theme->id) }}" method="post" class="flex flex-col">
                @csrf()
                @method('put')
                <x-form-input name="title" type="string" value="{{ $theme->title }}">Изменение заголовка:</x-form-input>
                <label for="description">Описание:</label>
                <textarea name="description" id="description" rows="10" class="resize-none bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">{{ $theme->description }}</textarea>
                <x-error error="description"></x-error>
                <x-form-button>Edit!</x-form-button>
            </form>
        </x-block>
    </x-container>

@endsection
