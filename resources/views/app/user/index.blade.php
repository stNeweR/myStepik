@extends("app.layouts.main")

@section("title")
    {{ $user->user_name }}
@endsection

@section("page")

    <x-app.container>
        <x-block>
            <h1 class="text-xl"><b>User data!</b></h1>
            <p><b>User_name: </b>{{ $user->user_name }}</p>
            <p><b>Full_name: </b>{{ $user->full_name }}</p>
            <p><b>Email: </b>{{ $user->email }}</p>
        </x-block>
        <x-block class="">
            <h1 class="text-xl"><b>Courses:</b></h1>
            <div class="flex flex-col gap-4 my-2 hover:shadow-lg">
                @foreach ($courses as $course)
                    <a class="border-b hover:border-purple-800 hover:bg-slate-900 py-1 px-2" href="{{ route("courses.show", $course->id) }}">
                        <h1>{{ $course->title }}</h1>
                        <h1>{{ $course->description }}</h1>
                    </a>
                @endforeach
            </div>
        </x-block>
        <x-block>
            <h1 class="text-xl"><b>My courses:</b></h1>
                @if($myCourses->isEmpty())
                    <p>No course!!</p>
                @endif
                    @foreach ($myCourses as $course)
                        <p>{{ $course->title }}</p>
                    @endforeach
                @else
        </x-block>
    </x-app.container>

@endsection
