<header class="bg-slate-800 fixed top-0 left-0 w-full shadow-xl">
    <div class="w-11/12 mx-auto flex items-center justify-between">
        <div class="flex items-center gap-4 py-2">
            <x-logo></x-logo>
            <nav class="flex gap-4">
                <x-app.link href="">Каталог</x-app.link>
                <x-app.link href="">Обучение</x-app.link>
                <x-app.link href="">Преподование</x-app.link>
                @can("admin-access")
                    <x-app.link href="{{ route('admin.index')}}">Admin!</x-app.link>
                @endcan
            </nav>
        </div>
        <div class="flex gap-4">
            @guest
                <x-app.link href="{{ route('login.index') }}">Войти</x-app.link>
                <x-app.link href="{{ route('register.index') }}">Регистрация</x-app.link>
            @endguest
            @auth
                <x-app.link href="{{ route('profile') }}">Profile</x-app.link>
                <form action="{{ route("logout")}}" method="post">
                    @csrf
                    @method("post")
                    <button class="text-rose-500">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>
