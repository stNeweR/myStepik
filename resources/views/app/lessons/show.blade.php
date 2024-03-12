@extends("app.layouts.lesson")

@section("title")
    {{ $lesson->title  }}
@endsection

@section("page")
    <div class="flex gap-4 min-h-screen max-h-full">
        <div class="bg-slate-800">
            <h1 class="text-xl m-1"><b>{{ $course->title }}</b></h1>
            <div class="flex flex-col">
                @foreach ($themes as $theme)
                    <p class="w-full border-b border-t px-1">{{ $theme->title }}</p>
                    @foreach ($theme->lessons as $courseLesson)
                        @if ($myLessons->contains('id', $courseLesson->id))
                            <div class="bg-green-700 text-sm px-3 {{ $lesson->id === $courseLesson->id ? 'bg-slate-900' : '' }}">
                                <x-link href="{{ route('lessons.show', $courseLesson->id)}}">Lesson: {{ $courseLesson->id }} {{ $courseLesson->title}}</x-link>
                            </div>
                        @else
                            <div class="{{ $lesson->id === $courseLesson->id ? 'bg-slate-900' : '' }} px-3 text-sm">
                                <x-link href="{{ route('lessons.show', $courseLesson->id) }}" class="text-sm">Lesson: {{ $courseLesson->id }} {{ $courseLesson->title }}</x-link>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="w-full">
            <div class="bg-slate-800 p-2">
                <h1 class="text-xl"><b>{{ $lesson->title }}</b></h1>
                <p>{{ $lesson->body }}</p>
                @if($lesson->hasSurvey())
                    <h1 class="text-xl mt-4"><b>Вопросы:</b></h1>
                    @foreach($surveys as $survey)
                        <div class="my-2">
                            <p><b>Вопрос:</b> {{ $survey->body }}</p>
                            @if (session("message")==="Вы выбрали правильный ответ!")
                                <p class="bg-green-700 inline">{{ session("message") }}</p>
                            @else
                                <p class="bg-rose-700 inline">{{ session("message")}}</p>
                            @endif
                            <form action="{{ route("surveys.check", $survey->id) }}" method="post">
                                @csrf
                                @method("post")
                                <input type="hidden" name="survey_id" value="{{ $survey->id }}">
                                @foreach($survey->options as $option)
                                    <div class="flex gap-2">
                                        <input id="option_id" type="radio" name="option_id" value="{{ $option->id }}" required>
                                        <label for="option_id">{{ $option->body }}</label>
                                    </div>
                                @endforeach
                                <button type="submit" class="hover:text-purple-600 hover:border-b hover:border-purple-600">Check!</button>
                            </form>
                            @can('isAuthor', $course->id)
                                <div class="my-2">
                                    <form action="{{ route('options.store', $survey->id) }}" method="post" class="flex flex-col gap-1">
                                        @csrf
                                        @method('post')
                                        <label for="body">Add option Body:</label>
                                        <input type="text" name="body" id="body" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2">
                                        <x-form-button>Create option!</x-form-button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    @endforeach
                @endif
                <div class="flex gap-2">
                    @if ($myLessons->contains("id", $lesson->id))
                        <form action="{{ route("lessons.unsuccess", $lesson->id)}}" method="post">
                            @method("delete")
                            @csrf
                            <button class="bg-rose-700 py-1 px-2 rounded">UnSuccess</button>
                        </form>
                    @else
                        <form action="{{ route("lessons.succes", $lesson->id)}}" method="post">
                            @csrf
                            @method("post")
                            <button class="bg-green-700 py-1 px-2 rounded">Success</button>
                        </form>
                    @endif
                </div>
            </div>
            @can("isAuthor", $course->id)
                <x-block class="mt-4">
                    <form action="{{ route('surveys.store', $lesson->id)}}" class="flex flex-col gap-1" method="post">
                        @csrf
                        @method('post')
                        <label for="body">Create survey:</label>
                        <textarea name="body" id="body" rows="5" class="bg-slate-900 focus:bg-slate-950 outline-none py-1 px-2"></textarea>
                        <x-form-button>Create survey!</x-form-button>
                    </form>
                </x-block>
            @endcan
        </div>

    </div>

@endsection
