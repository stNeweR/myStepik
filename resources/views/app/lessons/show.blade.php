@extends("app.layouts.lesson")

@section("title")
    {{ $lesson->title  }}
@endsection

@section("page")
        <div class="flex gap-4">
            <div class="bg-slate-800 p-2 w-96">
                <h1 class="text-xl border-b my-1"><b>{{ $course->title }}</b></h1>
                <div class="flex flex-col">
                    @foreach($lessons as $courseLesson)
                        @if($courseLesson->id === $lesson->id)
                            <p class="bg-green-900 w-full my-1">{{ $courseLesson->title }}</p>
                        @else
                            <a href="{{ route("lessons.show", $courseLesson->id) }}" class="my-1 hover:bg-slate-900">{{ $courseLesson->title }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div>
                <div class="bg-slate-800 p-2">
                    <h1 class="text-xl"><b>{{ $lesson->title }}</b></h1>
                    <p>{{ $lesson->body }}</p>
                    @if($lesson->hasSurvey())
                        <h1 class="text-xl mt-4"><b>Вопросы:</b></h1>
                        @foreach($surveys as $survey)
                            <div class="my-2">
                                <p><b>Вопрос:</b> {{ $survey->question }}</p>
                                @foreach($survey->options as $option)
                                    <form action="" method="post" class="flex gap-2">
                                        @method('post')
                                        @csrf
                                        <input type="checkbox">
                                        <p>{{ $option->body }}</p>
                                    </form>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
@endsection
