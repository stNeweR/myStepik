@extends("admin.layout.main")

@section("page")
<x-container class="">
    <div class="grid grid-cols-2 gap-4">
        <x-block>
            <form action="{{ route("admin.users.find")}}"  method="get" class="flex flex-col gap-3 mb-2">
                <label for="field" class="text-xl font-semibold">Поиск по:</label>
                <select class="bg-slate-600 py-1 px-2 rounded" name="field" id="field">
                    <option value="user_name">User_name</option>
                    <option value="email">Email</option>
                    <option value="first_name">First_name</option>
                    <option value="last_name">Last_name</option>
                    <option value="created_at">Created_at</option>
                </select>
                <label for="deleted" class="text-xl font-semibold">Удален или нет</label>
                <select name="deleted" id="deleted" class="bg-slate-600 py-1 px-2 rounded">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                <x-form-input name="body" type="string">Поиск по полю:</x-form-input>
                <x-form-button>Find user!</x-form-button>
            </form>
        </x-block>
        <x-block>
            <h1 class="text-xl">Количество пользователей:</h1>
            <p>{{ $usersCount }}</p>
            <h1 class="text-xl">Новых пользователей за неделю:</h1>
            <p>{{ $usersCount }}</p>
        </x-block>
    </div>
    <x-block>
        <table class="w-full text-left mb-2">
            <thead class="">
                <tr class="border-b border-slate-600 ">
                    <th>Id</th>
                    <th class="py-1" scope="col">USER_NAME</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">DELETE_AT</th>
                    <th scope="col">SEE MORE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr scope="row" class="border-t border-slate-600">
                        <td>{{ $user->id }}</td>
                        <td class="py-2">{{ $user->user_name }}</td>
                        <td class="">{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td class="">{{ $user->email }}</td>
                        <td class="">{{ date("Y-m-d", strtotime($user->created_at)) }}</td>
                        @if ($user->deleted_at === Null)
                            <td>
                                <form action="{{ route("admin.users.delete", $user->id)}}" method="POST">
                                    @method("delete")
                                    @csrf()
                                    <button class="bg-red-500 py-1 px-2 rounded">Delete!</button>
                                </form>
                            </td>
                        @else
                            <td class="">
                                <form action="{{ route("admin.users.restore", $user->id)}}" method="POST">
                                    @csrf()
                                    @method("post")
                                    <button class="bg-green-500 py-1 px-2 rounded">{{ date("Y-m-d", strtotime($user->deleted_at)) }} <br> Restore</button>
                                </form>
                            </td>
                        @endif
                        <td class=""><a href="{{ route("admin.users.show", $user->id )}}">See</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </x-block>
</x-container>
@endsection
