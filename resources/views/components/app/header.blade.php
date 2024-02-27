<header class="bg-slate-800 fixed top-0 left-0 w-full shadow-xl">
    <div class="w-11/12 mx-auto flex items-center justify-between">
        <div class="flex items-center gap-4 py-2">
            <x-logo></x-logo>
            <nav class="flex gap-4">
                <a href="">Каталог</a>
                <a href="">Обучение</a>
                <a href="">Преподование</a>
            </nav>
        </div>
        <div class="flex gap-4">
            <a href="">Войти</a>
            <a href="{{ route("register.index") }}">Регистрация</a>
        </div>
    </div>
</header>
