@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <form enctype="multipart/form-data"  method="POST" action="{{url('/doAddPost')}}">
            @csrf

            <input id="owner_id" type="text" class="form-control" value="{{Auth::user()->id}}" name="owner_id" hidden>

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title">

                </div>
            </div>

            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('caption') }}</label>

                <div class="col-md-6">
                    <input id="caption" type="text" class="form-control" name="caption">

                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control" name="image">

                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

                <div class="col-md-6">
                    <input id="price" type="text" class="form-control" name="price">

                </div>
            </div>

            <div class="form-group row">
                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                <div class="col-md-6">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span role="alert" style="color: red"><strong>{{ $error }}</strong></span><br>
                @endforeach
            @endif

            <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>
            </div>
        </form>

    </div>
</div>
@endsection
    {{--image: {{url('Aset/', Auth::user()->picture)}}--}}