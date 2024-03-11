<header class="bg-slate-800 fixed top-0 left-0 w-full shadow-xl">
    <div class="w-11/12 mx-auto flex items-center justify-between">
        <div class="flex items-center gap-4 py-2">
            <x-logo></x-logo>
            <nav class="flex gap-4">
                <x-link href="{{ route('catalog.') }}">Каталог</x-link>
                <x-link href="{{ route('myCourses') }}">Обучение</x-link>
                 <x-link href="{{ route('courses.create') }}">Преподование</x-link>
                @can("adminAccess")
                    <x-link href="{{ route('admin.index')}}">Admin!</x-link>
                @endcan
            </nav>
        </div>
        <div class="flex gap-4">
            @guest
                <x-link href="{{ route('login.index') }}">Войти</x-link>
                <x-link href="{{ route('register.index') }}">Регистрация</x-link>
            @endguest
            @auth
                <x-link href="{{ route('profile') }}">Profile</x-link>
                <form action="{{ route("logout")}}" method="post">
                    @csrf
                    @method("post")
                    <button class="text-rose-500">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>
