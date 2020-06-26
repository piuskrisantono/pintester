@extends('layouts.app')

@section('content')
<div class="container">

    Item in cart:
    <span>{{\Illuminate\Support\Facades\Session::has('cart')?\Illuminate\Support\Facades\Session::get('cart')->totalQty : 0}}</span>
    @if(\Illuminate\Support\Facades\Session::get('cart') != null)
        @foreach($posts as $post)
        <div class="row" style="padding: 5px; background-color: lightgrey">
            <div class="col-3" style="height: 200px; overflow: hidden">
                <img src="{{url('Aset/'.$post['post']['image'])}}" alt="" style="width: auto; height:100%;">
            </div>
            <div class="col-8">
                Image Title: <span>{{$post['post']['title']}}</span><br>
                Image Price: <span>{{$post['post']['price']}}</span><br>
                Image Owner: <span>{{$post['ownerName']}}</span><br>
                <a href="{{url('/removeFromCart/'.$post['post']['id'])}}" type="button" class="btn btn-danger">Remove</a>
            </div>
        </div>
        @endforeach
        Total Price: {{$totalPrice}} <span><a href="{{url('/checkOut/'.Auth::user()->id)}}" type="button" class="btn btn-primary">Checkout</a></span>
    @endif
</div>
@endsection
