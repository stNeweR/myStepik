@extends("admin.layout.main")

@section("page")

    <p><b>User_name:</b> {{ $user->user_name }}</p>
    <p><b>First_name:</b> {{ $user->first_name }}</p>
    <p><b>Last_name:</b> {{ $user->last_name }}</p>
    <p><b>Email:</b> {{ $user->email }}</p>
    <p><b>Register_at:</b> {{ $user->created_at }}</p>
    @if ($user->deleted_at === Null)
        <p><b>Is bunned:</b> No</p>
    @else
        <p><b>Is bunned:</b> {{ $user->deleted_at}}</p>
    @endif







@endsection
