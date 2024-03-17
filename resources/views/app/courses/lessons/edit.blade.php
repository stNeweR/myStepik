@extends('app.layouts.main')


@section('title')
    {{ $lesson->title }} | Edit
@endsection


@section('page')

    <x-container class="flex items-center justify-center">
        <x-block class="w-1/2 p-3">
            <form action="{{ route('lessons.update', $lesson->id) }}" method="post" class="flex flex-col">
                @csrf()
                @method('put')
                <x-form-input name="title" type="string" value="{{ $lesson->title }}">Изменение заголовка:</x-form-input>
                <label for="body">Описание:</label>
                <textarea name="body" id="body" rows="10" class="resize-none bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">{{ $lesson->body }}</textarea>
                <x-error error="body" />
                <x-form-button>Edit!</x-form-button>
            </form>
        </x-block>
    </x-container>

@endsection
