@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 rounded" style="background-color: lightgrey">
            <div class="row justify-content-between">
                <div class="col-1 float-left">{{$post->user->name}}</div>

                <div class="col- float-right">
                    @if(Auth::user())
                        @if(Auth::user()->id != $post->owner_id)
                            <a href="{{url('/addToCart/'.$post->id)}}" class="btn btn-primary" >Add to cart</a>
                        @endif
                        @if(Auth::user()->id == $post->owner_id | Auth::user()->role == 'admin')
                                <a href="{{url('/deletePost/'.$post->id)}}" class="btn btn-primary" >Delete Post</a>
                            @endif

                    @endif


                </div>

            </div>
            <div class="row">
                <h1>{{$post->title}}</h1>
            </div>
            <div class="row">
                {{$post->category->category_name}}
            </div>
            <div class="row">
                <img src="{{url('Aset/'.$post->image)}}" alt="" style="width: 100%;height: auto">
            </div>
            <div class="row">
                <p>{{$post->caption}}</p>
            </div>
            @if(Auth::user())
            <div class="row">
                Comments
            </div>
            @foreach($comments as $comment)
            <div class="row" style="background-color:white;margin: 5px;">
                <div class="col-2">
                    <img src="{{url('Aset/'.$comment->user->picture)}}" class="rounded-circle"  style="width: 50px; height: auto;" alt="">
                </div>
                <div class="col-10">
                    <div class="row">
                        {{$comment->user->name}}
                    </div>
                    <div class="row">{{$comment->description}}</div>
                </div>
            </div>
            @endforeach
            <div class="row">
                Add your comment
            </div>
            <form action="{{url("/addComment")}}" method="post">
            <div class="row" style="margin:5px;">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" />
                <input type="hidden" name="post_id" value="{{ $post->id}}" />
                <textarea style="width: 100%;" name="description" id="" cols="" rows="5"  placeholder="Write your comment here..."></textarea>

            </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <span role="alert" style="color: red"><strong>{{ $error }}</strong></span><br>
                    @endforeach
                @endif
            <div class=" row justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            @endif

        </div>



    </div>

</div>
@endsection
