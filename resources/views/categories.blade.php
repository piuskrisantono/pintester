@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-" style="height: 200px;width: 200px;border-radius: 100px; background-size:100%;background-image: url({{url('Aset/', Auth::user()->picture)}});">

            </div>
            <div class="col-1">

            </div>
            <div class="col-">
                <div class="row">
                    <h1>{{Auth::user()->name}}</h1>
                </div>
                <div class="row">
                    <h3>{{Auth::user()->email}}</h3>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
            <div class="col-sm-">
                <a class="btn btn-outline-primary" href="{{url('/profile')}}" role="button">Profile</a>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-">
                <a class="btn btn-primary" href="#" role="button">Categories</a>
            </div>
    </div>
    <br>
    <div class="row justify-content-center">
        @foreach($categories as $category)
            <form action="{{url('/doFollow/'.$category->id.'/'.Auth::user()->id)}}" method="get" style="margin: 5px;">

                <div class="input-group">
                    <input type="text" class="form-control" name="category" value="{{$category->category_name}}" disabled>
                    @if(in_array($category->id,$followed))
                    <span class="input-group-btn">
                       <button type="submit" class="btn btn-primary">Followed</button>
                   </span>
                    @else
                        <span class="input-group-btn">
                           <button type="submit" class="btn btn-outline-primary">Not-followed</button>
                        </span>
                    @endif

                </div>


            </form>

        @endforeach


    </div>
</div>
@endsection
    {{--image: {{url('Aset/', Auth::user()->picture)}}--}}