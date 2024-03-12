@extends("app.layouts.main")

@section("title")
    Catalog!
@endsection

@section("page")

    <x-app.container>
        <x-block>
            <form action="" method="get">
                <label for="">Поиск:</label>
                <input type="text" class="bg-transparent border-b border-slate-900 outline-none focus:border-purple-600">
                <button type="submit">Поиск</button>
            </form>
        </x-block>
        <x-block>
            @foreach($courses as $key => $course)
                <a href="{{ route("courses.show", $course->id) }}">
                    <div class=" {{$key == count($courses) -1 ? '' : 'border-b'}} hover:border-b py-3 px-3 hover:border-purple-600 hover:bg-slate-900">
                        <h1>{{ $course->title  }}</h1>
                        <p>{{$course->description}}</p>
                    </div>
                </a>
            @endforeach
        </x-block>
        {{ $courses->links() }}
    </x-app.container>

@endsection
