@extends("app.layouts.main")

@section("title")
    {{ $course->title  }}
@endsection

@section("page")
    <x-app.container>
        <x-block>
            <div class="flex flex-col gap-1">
                <h1 class="text-xl"><b>Информация о курсе:</b></h1>
                <p><b>Заголовок: </b>{{ $course->title }}</p>
                <p><b>Описание: </b>{{ $course->description }}</p>
                <p><b>Цена: </b>{{ $course->price }} ₽</p>
                <p><b>Автор курса: </b><x-link href=""> {{ $author->user_name }} </x-link></p>
                @if(auth()->user()->subscribeCourse($course->id))
                    <form action="{{ route("courses.unsubscribe", $course->id) }}" method="post">
                        <button type="submit">UnSubscribe!</button>
                    </form>
                @else
                    <form action="{{ route("courses.subscribe", $course->id) }}" method="post">
                        <button type="submit" class="bg-green-700 py-1 px-2 rounded">Subscribe!</button>
                    </form>
                @endif
            </div>
        </x-block>
        <x-block>
            <div class="flex flex-col gap-1">
                <h1 class="text-xl"><b>Заниятия в курсе:</b></h1>
                @foreach($lessons as $lesson)
                    <div class="flex gap-1">
                        <p>{{ $lesson->id }})</p>
                        <p>{{ $lesson->title }}</p>
                    </div>
                @endforeach
            </div>
        </x-block>
    </x-app.container>
@endsection