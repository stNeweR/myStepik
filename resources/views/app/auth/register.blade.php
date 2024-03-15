@extends("app.layouts.main")

@section("title")
    Register
@endsection

@section("page")
    <x-container class="">
        <x-block class="w-1/3 mx-auto my-auto">
            <form action="{{ route("register.store") }}" method="post" class="flex flex-col gap-3 p-1">
                @csrf
                @method("post")
                <div class="flex flex-col gap-2">
                    <label for="user_name">User_name:</label>
                    <input type="text" name="user_name" id="user_name" placeholder="Ник пользователя..." class="{{ $errors->has("user_name") ? "placeholder-rose-500" : "" }} bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                @error('user_name')
                    <p class="text-rose-500">{{ $message }}</p>
                @enderror
                <div class="flex flex-col gap-1">
                    <label for="full_name">Full_name:</label>
                    <input type="text" name="full_name" id="full_name" placeholder="Фамилия и имя пользователя.." class=" {{ $errors->has("full_name") ? "placeholder-rose-500" : "" }} bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                @error('full_name')
                    <p class="text-rose-500">{{ $message }}</p>
                @enderror
                <div class="flex flex-col gap-1">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Почта.." class="{{ $errors->has("email") ? "placeholder-rose-500" : "" }} bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                @error("email")
                    <p class="text-rose-500">{{ $message }}</p>
                @enderror
                <div class="flex flex-col gap-1">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Пароль..." class="{{ $errors->has("password") ? "placeholder-rose-500" : "" }} bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                @error("password")
                    <p class="text-rose-500">{{ $message }}</p>
                @enderror
                <div class="flex flex-col gap-1">
                    <label for="password">Password_confirmation:</label>
                    <input type="password" name="password_confirmation" placeholder="Подтверждение пароля..." id="password" class=" {{ $errors->has("user_name") ? "placeholder-rose-500" : "" }} bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                </div>
                @error('password.confirm')
                    <p class="text-rose-500">{{ $message }}</p>
                @enderror
                <div class="flex gap-2 items-center">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <p>Если вы уже зарегестрированы: <x-link href="{{ route('login.index') }}">Login!</x-link></p>
                <button class="bg-purple-600 py-1 rounded mt-2 hover:bg-transparent hover:border hover:border-purple-600 transition">Register!</button>
            </form>
        </x-block>
    </x-container>

@endsection
