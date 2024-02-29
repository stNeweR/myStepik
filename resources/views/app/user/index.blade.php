@extends("app.layouts.main")

@section("title")
    {{ $user->user_name }}
@endsection

@section("page")

    <x-container>
        <x-block>
            <h1><b>User_name: </b>{{ $user->user_name }}</h1>
            <h1><b>Full_name: </b>{{ $user->full_name }}</h1>
            <h1><b>Email: </b>{{ $user->email }}</h1>
        </x-block>
        <x-block class="">
            <h1>Courses:</h1>
            <div class="flex flex-col gap-4 mt-2 hover:shadow-lg">
                @foreach ($courses as $course)
                <a class="border border-purple-600 hover:border-purple-800 py-1 px-2 rounded" href="">
                    <h1>{{ $course->title }}</h1>
                    <h1>{{ $course->description }}</h1>
                </a>
                @endforeach
            </div>
        </x-block>
        <x-block>
            <h1>My courses:</h1>
            @empty(!$myCourses)
                @foreach ($myCourses as $course)
                <h1>{{ $course->title }}</h1>
                @endforeach
            @endempty
        </x-block>
    </x-container>

@endsection
