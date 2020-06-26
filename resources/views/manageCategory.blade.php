@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <h1>Category</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"> Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Auth</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)

                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->category_name}}</td>
                            <td><a href="{{url('/updateCategory/'.$category->id)}}" type="button" class="btn btn-primary">Update</a><a href="{{url('/doDeleteCategory/'.$category->id)}}" type="button" class="btn btn-danger">Delete</a></td>
                        </tr>

                @endforeach
                </tbody>
            </table>

    </div>
    <div class="row justify-content-center">
        <a href="{{url('/addCategory')}}" type="button" class="btn btn-warning">+Add</a>
    </div>
</div>
@endsection
