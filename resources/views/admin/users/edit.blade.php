@extends("admin.layout.main")

@section("page")

    <x-container>
        <x-block>
            <form action="{{ route("admin.users.update", $user->id) }}" method="POST" class="" >
                @method("put")
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="" class="font-bold">First_name:</label>
                    <input class="bg-transparent border-b outline-none"  type="text" name="first_name" value="{{ $user->first_name}}">
                    @error("first_name")
                        <p>{{ $message}}</p>
                    @enderror
                    <label for="">Fisrt_name:</label>
                    <input type="text" class="bg-transparent border-b outline-none"  name="first_name"  value="{{ $user->last_name}}">
                    <x-error error="first_name"></x-error>
                    <label for="">Last_name:</label>
                    <input type="text" class="bg-transparent border-b outline-none"  name="last_name"  value="{{ $user->last_name}}">
                    <x-error error="last_name"></x-error>
                    <label for="">Email:</label>
                    <input type="text" class="bg-transparent border-b outline-none" name="email" value="{{ $user->email}}">
                    <x-error error="email"></x-error>
                    <label for="">User_name:</label>
                    <input type="text" class="bg-transparent border-b outline-none" name="user_name" value="{{ $user->user_name}}">
                    <x-error error="user_name"></x-error>
                    <label for="">New password:</label>
                    <input type="text" class="bg-transparent border-b outline-none {{ $errors->has("password") ? 'border-red-600': 'text-white'}}" placeholder="new password" name="password">
                    <label for="">Password confirm:</label>
                    <input type="text" class="bg-transparent border-b outline-none {{ $errors->has('password') ? 'border-red-600' : 'text-white' }}" placeholder="Password confirm" name="password_confirmation">
                    <x-error error="password"></x-error>
                </div>
                <button type="submit">Edit!</button>
            </form>
        </x-block>
    </x-container>

@endsection
