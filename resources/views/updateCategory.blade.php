@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-" style="height: 200px;width: 200px;border-radius: 100px; background-size:100%;background-image: url({{url('Aset/', Auth::user()->picture)}});">

            </div>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">
        <form   method="POST" action="{{url('/doUpdateCategory')}}">
            @csrf
            <div class="form-group row">
                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('category_id') }}</label>

                <div class="col-md-6">
                    <input id="category_id" type="text" class="form-control" name="category_id" value="{{ $category->id }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$category->category_name}}" autofocus>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span role="alert" style="color: red"><strong>{{ $error }}</strong></span><br>
                @endforeach
            @endif

            <div class="form-group row">

                <div class="col-">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>
@endsection
    {{--image: {{url('Aset/', Auth::user()->picture)}}--}}