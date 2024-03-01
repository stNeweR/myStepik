<aside class="flex w-1/5 bg-slate-800  text-slate-200">
    <div class="w-full mx-3 mt-2">
        <h1 class="text-xl font-semibold">MENU</h1>
        <nav class="flex flex-col gap-2 mt-2">
            <a class="hover:bg-slate-600 px-2 py-1 rounded transition"  href="{{ route("admin.users.index")}}">Users</a>
            <a class="hover:bg-slate-600 px-2 py-1 rounded transition"  href="{{ route("admin.courses.index")}}">Courses</a>
            <a class="hover:bg-slate-600 px-2 py-1 rounded transition"  href="{{ route("admin.lessons.index")}}">Lessons</a>
        </nav>
    </div>
</aside>
