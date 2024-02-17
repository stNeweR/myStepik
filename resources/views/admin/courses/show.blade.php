@extends("admin.layout.main")

@section("page")
    <x-container>
        <x-block>
            <h1><b>Title: </b>{{ $course->title}}</h1>
            <p><b>Description: </b>{{ $course->description }}</p>
            <p><b>Auther: </b>{{ $auther->user_name }}</p>
        </x-block>
        <x-block>
            <h1><b>Lessons:</b></h1>
            <div class="flex flex-col gap-1">
                @foreach ($lessons as $lesson )
                    <a href="{{ route("admin.lessons.show", $lesson->id)}}">
                        <h1>{{ $lesson->id}}) {{ $lesson->title }}</h1>
                    </a>
                @endforeach
            </div>
        </x-block>
    </x-container>

@endsection
