@extends("admin.layout.main")

@section("page")
    <x-container>
        <x-block>
            <h1><b>Title: </b>{{ $course->title}}</h1>
            <p><b>Description: </b>{{ $course->description }}</p>
            <p><b>Auther: </b>{{ $auther->user_name }}</p>
            <x-link href="{{ route('admin.courses.edit', $course->id)}}">Edit!</x-link>
        </x-block>
        <x-block>
            <h1><b>Info!</b></h1>
            <p><b>Users: </b></p>
            <div class="flex flex-col gap-1">
                @foreach ($users as $user)
                    <x-link href="{{ route('admin.users.show', $user->id) }}">{{ $user->user_name }}</x-link>
                @endforeach
            </div>
        </x-block>
        <x-block>
            <h1><b>Lessons:</b></h1>
            <div class="flex flex-col gap-1">
                @foreach ($lessons as $lesson )
                    <x-link href="{{ route('admin.lessons.show', $lesson->id)}}">{{ $lesson->id}}) {{ $lesson->title }}</x-link>
                @endforeach
            </div>
        </x-block>
    </x-container>

@endsection
