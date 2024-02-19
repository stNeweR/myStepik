@extends("admin.layout.main")

@section("page")
    <x-container>
        <x-block>
            @foreach ($lessons as $lesson)
                <h1>{{ $lesson->title }}</h1>
            @endforeach
        </x-block>
    </x-container>
@endsection
