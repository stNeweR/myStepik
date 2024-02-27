@extends("app.layouts.main")


@section("page")

    <x-container class="">
        <x-block class="w-1/3 mx-auto my-auto">
            <form action="{{ route("register.create") }}" method="post" class="flex flex-col gap-3 p-1">
                @csrf
                @method("post")
                <div class="flex flex-col gap-2">
                    <label for="user_name">User_name:</label>
                    <input type="text" name="user_name" id="user_name" class="bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="full_name">Full_name:</label>
                    <input type="text" name="full_name" id="full_name" class="bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password">Password_confirmation:</label>
                    <input type="password" name="password_confirmation" id="password" class="bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                <p>Если вы уже зарегестрированы: <x-link href="{{ route('login.index') }}">Login!</x-link></p>
                <button class="bg-purple-600 py-1 rounded mt-2 hover:bg-transparent hover:border hover:border-purple-600 transition">Register!</button>
            </form>
        </x-block>
    </x-container>

@endsection
