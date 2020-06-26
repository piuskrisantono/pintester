@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <h1>Users</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Auth</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)

                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->gender}}</td>
                            <td><a href="{{url('/editProfile/'.$user->id)}}">Edit</a></td>
                        </tr>

                @endforeach
                </tbody>
            </table>

    </div>
    <div class="row justify-content-center">

    </div>
</div>
@endsection
