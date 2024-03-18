@extends('app.layouts.main')


@section('title')
    Survey | Edit
@endsection


@section('page')

    <x-container class="flex items-center justify-center">
        <x-block class="w-1/2 p-3">
            <form action="{{ route('surveys.update', $survey->id) }}" method="post" class="flex flex-col">
                @csrf()
                @method('put')
                <label for="body">Вопрос:</label>
                <textarea name="body" id="body" rows="10" class="resize-none bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">{{ $survey->body }}</textarea>
                <x-error error="body" />
                <x-form-button>Edit!</x-form-button>
            </form>
        </x-block>
    </x-container>

@endsection
