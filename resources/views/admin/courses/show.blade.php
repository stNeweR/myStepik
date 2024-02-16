@extends("admin.layout.main")

@section("page")

    <x-block>
        @foreach ($lessons as $lesson )
            <h1>{{ $lesson->id}}{{ $lesson->title }}</h1>
            @dump($lesson->surveys)
        @endforeach
    </x-block>


@endsection
