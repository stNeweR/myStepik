@extends('app.layouts.main')


@section('title')
    {{ $user->user_name }} | Edit
@endsection

@section('page')
    <x-app.container class="flex items-center justify-center">
        <x-block class="w-1/2">
            <form action="{{ route('profile.update') }}" method="post" class="flex flex-col gap-2">
                @csrf
                @method('put')
                <x-form-input name="user_name" type="text" value="{{ $user->user_name }}">User_name:</x-form-input>
                <x-form-input name="full_name" type="text" value="{{ $user->full_name }}">Full_name:</x-form-input>
                <label for="description">Description</label>
                <textarea name="description" id="description" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2" >{{ $user->description }}</textarea>

                <x-form-button>Edit profile!</x-form-button>
            </form>
        </x-block>
    </x-app.container>
@endsection
