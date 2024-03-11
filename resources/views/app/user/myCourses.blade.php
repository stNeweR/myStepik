@extends("app.layouts.main")

@section("title")
    My courses!
@endsection

@section("page")
    <x-container>
        @foreach ($courses as $course)
            <a href="{{ route('courses.show', $course->id) }}">
                <x-block>
                    <div class="rounded bg-slate-900 p-2 hover:shadow-lg">
                        <h1><b class="text-xl">Курс: </b>{{ $course->title }}</h1>
                        <p><b>Описание: </b>{{ $course->description }}</p>
                        <p><b>Тело: </b>{{ $course->body }}</p>
                        <div class="flex flex-col">
                            <h1>Темы в курсе:</h1>
                            @foreach ($course["themes"] as $theme)
                                <div class="flex flex-col justify-center gap-2 my-1">
                                    <h1><b>{{ $theme->id }})</b> {{ $theme->title }}</h1>
                                    <div class="grid grid-cols-4 gap-2">
                                        @foreach ($theme["lessons"] as $lesson)
                                                <a href="{{ route("lessons.show", $lesson->id)}}" class="border rounded flex items-center justify-center px-2 py-1">
                                                    <small class="">{{ $lesson->id }}  {{ $lesson->title}}</small>
                                                </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </x-block>
            </a>
        @endforeach
    </x-container>
@endsection
