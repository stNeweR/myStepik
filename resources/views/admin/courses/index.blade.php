@extends("admin.layout.main")

@section("page")
<x-container>
    @foreach ($courses as $course)
        <h1>{{ $course->title }}</h1>
        <p>{{ $course->description}}</p>
        <a href="{{ route("admin.courses.show", $course->id)}}">See</a>
    @endforeach
    {{ $courses->links() }}

</x-container>
@endsection
