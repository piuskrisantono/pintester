@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::user())
    <a href="{{url('/home')}}">View all post</a>
    @endif
    <div class="row justify-content-center">
            @foreach($posts as $post)
                @if(in_array($post->category_id, $followed))
                    <a href="{{url('/detail/'.$post->id)}}" style="text-decoration: none;color:black;">
                    <div class="card" style="width: 18rem;margin: 5px;height: 300px;">
                        <img class="card-img-top" src="{{url('Aset/', $post->image)}}" style="width:auto ;height: 200px;" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->category->category_name}}</p>

                        </div>
                    </div>
                    </a>
                @endif
            @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
