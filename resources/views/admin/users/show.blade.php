@extends("admin.layout.main")

@section("page")

<x-container>
    <x-block>
        <p><b>User_name:</b> {{ $user->user_name }}</p>
        <p><b>First_name:</b> {{ $user->first_name }}</p>
        <p><b>Last_name:</b> {{ $user->last_name }}</p>
        <p><b>Email:</b> {{ $user->email }}</p>
        <p><b>Register_at:</b> {{ $user->created_at }}</p>
        @if ($user->deleted_at === Null)
            <p><b>Is bunned:</b> No</p>
        @else
            <p><b>Is bunned:</b> {{ $user->deleted_at}}</p>
        @endif
        <a href="{{ route("admin.users.edit", $user->id)}}">Edit!</a>
    </x-block>
    <div class="grid grid-cols-2 mt-4 gap-4">
        <x-block>
            <h1><b>Course then I started:</b></h1>
            <div class="flex flex-col gap-1 mt-2">
                @foreach ($courses as $course)
                    <a href="{{ route("admin.courses.show", $course->id)}}">{{ $course->title }}</a>
                @endforeach
            </div>
        </x-block>
        <x-block>
            <h1><b>My courses:</b></h1>
            <div class="flex flex-col gap-1 mt-2">
                @foreach ($myCourses as $myCourse)
                    <a href="{{ route("admin.courses.show", $course->id)}}">{{ $myCourse->title }}</a>
                @endforeach
            </div>
        </x-block>
    </div>

</x-container>

@endsection
