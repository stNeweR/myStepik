@extends("admin.layout.main")


@section("page")

    <x-container>
        <x-block>
            <h1>{{ $lesson->title}}</h1>
            <p>{{ $lesson->body}}</p>
        </x-block>
        <x-block>
            @if (count($surveys))
                @foreach ($surveys as $survey)
                    <p>{{ $survey->id }}{{ $survey->question }}</p>
                    <div class="flex flex-col">
                        @foreach ($survey->options as $option)
                            <small>{{ $option->body }} {{ $option->is_correct}}</small>
                        @endforeach
                    </div>
                @endforeach
            @else
                <h1>Вопросов нет</h1>
            @endif
        </x-block>
    </x-container>

@endsection
