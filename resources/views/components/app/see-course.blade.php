@props(["courses"])

<a href="{{ route("courses.show", $course->id) }}">
    <div class="{{ $key == count($courses) -1 ? 'border-b' : '' }} hover:border-b  py-3 px-3 hover:border-purple-600 hover:bg-slate-900 flex justify-between items-center">
        <div>
            <h1>{{ $course->title  }}</h1>
            <p>{{$course->description}}</p>
        </div>
        <div>
            @if($course->is_published)
                <h1>{{ date("Y-m-d",strtotime($course->created_at)) }}</h1>
            @else
                <h1 class="bg-rose-500 py-1 px-2 rounded">Not pusblished...</h1>
            @endif
        </div>
    </div>
</a>
