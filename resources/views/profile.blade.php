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
                <a class="btn btn-primary" href="#" role="button">Profile</a>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-">
                <a class="btn btn-outline-primary" href="{{url('/categories/'.Auth::user()->id)}}" role="button">Categories</a>
            </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <form   method="POST" action="{{url('/doUpdate')}}">
            @csrf
            <div class="form-group row">
                <label for="userId" class="col-md-4 col-form-label text-md-right">{{ __('User ID') }}</label>

                <div class="col-md-6">
                    <input id="userId" type="text" class="form-control" name="userId" value="{{ Auth::user()->id }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" autofocus>

                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" >


                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <select name="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span role="alert" style="color: red"><strong>{{ $error }}</strong></span><br>
                @endforeach
            @endif

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
    {{--image: {{url('Aset/', Auth::user()->picture)}}--}}