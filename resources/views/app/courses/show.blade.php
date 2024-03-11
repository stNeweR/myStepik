@extends("app.layouts.main")

@section("title")
    {{ $course->title  }}
@endsection

@section("page")
    <x-app.container>
        <x-block>
            <div class="flex flex-col gap-1">
                <h1 class="text-2xl"><b>Информация о курсе:</b></h1>
                <p><b>Заголовок: </b>{{ $course->title }}</p>
                <p><b>Описание: </b>{{ $course->description }}</p>
                <p><b>Цена: </b>{{ $course->price }} ₽</p>
                <p><b>Автор курса: </b><x-link href=""> {{ $author->user_name }} </x-link></p>
                <div class="flex items-center gap-2">
                    @auth
                        @if(auth()->user()->subscribeCourse($course->id))
                            <form action="{{ route("courses.unsubscribe", $course->id) }}" method="post">
                                @csrf()
                                @method("DELETE")
                                <button type="submit" class="bg-rose-700 py-1 px-2 rounded">UnSubscribe!</button>
                            </form>
                        @else
                            <form action="{{ route("courses.subscribe", $course->id) }}" method="post">
                                @csrf
                                @method("POST")
                                <button type="submit" class="bg-green-700 py-1 px-2 rounded">Subscribe!</button>
                            </form>
                        @endif
                        @can("isAuthor", $course->id)
                            <a href="{{ route("courses.edit", $course->id) }}" class="border border-purple-700 transition hover:bg-purple-700 py-1 px-2 rounded">Edit course info</a>
                        @endcan
                    @else
                        <x-link href="{{ route('login.index')}}">Login!</x-link>
                    @endauth
                </div>
            </div>
        </x-block>
        <x-block>
            <div class="flex flex-col gap-1">
                <h1 class="text-2xl"><b>Темы которые рассматриваются в курсе:</b></h1>
                @foreach($themes as $theme)
                    <h2 class="text-lg">{{ $theme->id }}) {{ $theme->title }}</h2>
                    @foreach($theme->lessons as $lesson)
                        <x-link href="{{ route('lessons.show', $lesson->id) }}">{{ $lesson->title }}</x-link>
                    @endforeach
                @endforeach
                @can("isAuthor", $course->id)
                    <a href="{{ route("courses.themes.create", $course->id) }}" class="border text-center  border-purple-700 transition hover:bg-purple-700 py-1 px-2 rounded">Add theme</a>
                @endcan
            </div>
        </x-block>
    </x-app.container>
@endsection
