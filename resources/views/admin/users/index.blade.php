@extends("admin.layout.main")

@section("page")
<div class="">
    <table class="w-full text-left mb-2">
        <thead class="bg-slate-200"">
            <tr class="border-b border-slate-400 ">
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
                    <tr scope="row" class="border-t">
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
</div>
@endsection
