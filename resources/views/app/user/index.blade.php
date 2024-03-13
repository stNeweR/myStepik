@extends("app.layouts.main")

@section("title")
    {{ $user->user_name }}
@endsection

@section("page")

    <x-app.container>
        <x-block>
            <h1 class="text-2xl"><b>User data!</b></h1>
            <p><b>User_name: </b>{{ $user->user_name }}</p>
            <p><b>Full_name: </b>{{ $user->full_name }}</p>
            <p><b>Email: </b>{{ $user->email }}</p>
            <p><b>Profile: </b>{{ $user->description }}</p>
        </x-block>
        <x-block>
            <h1 class="text-2xl"><b>Courses:</b></h1>
            <div class="flex flex-col gap-4 my-2 hover:shadow-lg">
                @foreach ($courses as $course)
                    <div class="rounded hover:border-purple-800 bg-slate-900 p-2 hover:shadow-lg">
                        <h1 class="text-xl"><b>Заголовок курса: </b>{{ $course->title }}</h1>
                        <div class="flex flex-col">
                            @foreach ($course["themes"] as $theme)
                                <div class="flex flex-col justify-center gap-2 my-1">
                                    <h1><b>{{ $theme->id }})</b> {{ $theme->title }}</h1>
                                    <div class="grid grid-cols-4 gap-2">
                                        @foreach ($theme["lessons"] as $lesson)
                                            @if ($myLessons->contains('id', $lesson->id))
                                                <a href="{{ route("lessons.show", $lesson->id)}}" class="hover:bg-purple-600 transition bg-green-800 rounded flex items-center justify-center px-2 py-1">
                                                    <small class="">{{ $lesson->id }}  {{ $lesson->title}}</small>
                                                </a>
                                            @else
                                                <x-button href="{{ route('lessons.show', $lesson->id)}}"><small>{{ $lesson->id }} {{ $lesson->title }}</small></x-button>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </x-block>
    </x-app.container>

@endsection
