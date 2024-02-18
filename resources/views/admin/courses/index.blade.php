@extends("admin.layout.main")

@section("page")
<x-container>
    <div class="grid grid-cols-2 gap-4">
        <x-block>
            <form action="{{ route("admin.courses.find")}}"  method="post" class="flex flex-col gap-3 mb-2">
                @csrf
                @method("post")
                <label for="field" class="text-xl font-semibold">Поиск по:</label>
                <select class="bg-slate-600 py-1 px-2 rounded" name="field" id="field">
                    <option value="title">title</option>
                    <option value="description">description</option>
                </select>
                <label for="deleted" class="text-xl font-semibold">Удален или нет</label>
                <select name="deleted" id="deleted" class="bg-slate-600 py-1 px-2 rounded">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                <label for="body">Поиск:</label>
                <input type="text" name="body" id="body" class="bg-slate-600 py-1 px-2 rounded outline-none">
                <button class="bg-purple-600 py-1 rounded" type="submit">Find!</button>
            </form>
        </x-block>
        <x-block>
            <h1 class="text-xl">Количество курсов:</h1>
            <p>{{ $coursesCount }}</p>
        </x-block>
    </div>
    <x-block class="mt-4">
        <table class="w-full">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>See more</th>
                    <th>Users</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td><x-link href="{{ route('admin.courses.show', $course->id)}}">Seee</x-link></td>
                        <td>{{ $course->users->count()}}</td>
                        <td>
                            @if ($course->deleted_at === Null)
                                <form action="{{ route("admin.courses.delete", $course->id)}}" method="POST">
                                    @method("delete")
                                    @csrf()
                                    <button class="bg-red-500 py-1 px-2 rounded">Delete!</button>
                                </form>
                            @else
                                <form action="{{ route("admin.courses.restore", $course->id)}}" method="POST">
                                    @csrf()
                                    @method("post")
                                    <button class="bg-green-500 py-1 px-2 rounded">{{ date("Y-m-d", strtotime($course->deleted_at)) }} <br> Restore</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $courses->links() }}
    </x-block>

</x-container>
@endsection
