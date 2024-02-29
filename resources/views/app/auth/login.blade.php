@extends("app.layouts.main")

@section("title")
    Login
@endsection

@section("page")
    <x-container class="">
        <x-block class="w-1/3 mx-auto my-auto">
            <form action="{{ route('login.create') }}" method="post" class="flex flex-col gap-3 p-1">
                @csrf
                @method("post")
                <div class="flex flex-col gap-1">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Почта..." class="{{ $errors->has('email') ? 'placeholder-rose-500' : '' }} bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                    @error('email')
                        <p class="text-rose-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Пароль..."  class="{{ $errors->has('password') ? 'placeholder-rose-500' : ''}} bg-transparent py-1 px-2 outline-none border-b focus:rounded focus:border-none transition focus:outline-purple-600 transition">
                    @error("password")
                        <p class="text-rose-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex gap-2 items-center">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <p>Если вы не зарегестрированы: <x-link href="{{ route('register.index') }}">Register!</x-link></p>
                <button class="bg-purple-600 py-1 rounded mt-2 hover:bg-transparent hover:border hover:border-purple-600 transition">Login!</button>
            </form>
        </x-block>
    </x-container>

@endsection
