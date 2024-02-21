@extends("admin.layout.main")

@section("page")
    <x-container>
        <div class="grid grid-cols-2 gap-4">
            <x-block>
                <form action="{{ route("admin.lessons.search")}}"  method="post" class="flex flex-col gap-3 mb-2">
                    @csrf
                    @method("post")
                    <label for="deleted" class="text-xl font-semibold">Удален или нет</label>
                    <select name="deleted" id="deleted" class="bg-slate-600 py-1 px-2 rounded">
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                    <label for="searchTerm">Поиск по заголовку:</label>
                    <input type="text" name="searchTerm" id="searchTerm" class="border-b bg-transparent outline-none">
                    <button class="bg-purple-600 py-1 rounded" type="submit">Search!</button>
                </form>
            </x-block>
            <x-block>
                <h1><b>Lessons: </b>{{ $lessonsCount }}</h1>
            </x-block>
        </div>
        <x-block>
            <table class="w-full">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Course_id</th>
                        <th>Question</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lessons as $lesson)
                        <tr class="border-t border-slate-600">
                            <td>{{ $lesson->id }}</td>
                            <td class="py-2">{{ $lesson->title}}</td>
                            <td>{{ $lesson->course_id}}</td>
                            <td>
                                @if (count($lesson->surveys))
                                    <h1>Yes</h1>
                                @else
                                    <h1>No</h1>
                                @endif
                            </td>
                            <td>
                                @if ($lesson->deleted_at === Null)
                                    <form action="{{ route("admin.lessons.delete", $lesson->id)}}" method="POST">
                                        @method("delete")
                                        @csrf()
                                        <button class="bg-red-500 py-1 px-2 rounded">Delete!</button>
                                    </form>
                                @else
                                    <form action="{{ route("admin.lessons.restore", $lesson->id)}}" method="POST">
                                        @csrf()
                                        @method("post")
                                        <button class="bg-green-500 py-1 px-2 rounded">{{ date("Y-m-d", strtotime($lesson->deleted_at)) }} <br> Restore</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $lessons->links() }}
        </x-block>
    </x-container>
@endsection
