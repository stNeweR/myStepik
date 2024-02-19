@extends("admin.layout.main")

@section("page")
    <x-container>
        <div class="grid grid-cols-2 gap-4">
            <x-block>
                {{-- {{ $searchTerm }} --}}
            </x-block>
            <x-block>
                <h1 class="text-xl">Количество курсов:</h1>
                {{-- <p>{{ $coursesCount }}</p> --}}
            </x-block>
        </div>
        <x-block>
            @foreach ($courses as $course)
                <h1>{{ $course->title }}</h1>
            @endforeach
        </x-block>
    </x-container>
@endsection
