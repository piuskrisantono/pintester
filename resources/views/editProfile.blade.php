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
        <form   method="POST" action="{{url('/doEdit')}}">
            @csrf
            <div class="form-group row">
                <label for="userId" class="col-md-4 col-form-label text-md-right">{{ __('User ID') }}</label>

                <div class="col-md-6">
                    <input id="userId" type="text" class="form-control" name="userId" value="{{ $user->id }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}" autofocus>

                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" >

                </div>
            </div>


            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <select name="gender" class="form-control">
                        @if($user->gender == 'Male')
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                            @else
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            @endif
                    </select>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span role="alert" style="color: red"><strong>{{ $error }}</strong></span><br>
                @endforeach
            @endif

            <div class="form-group row">

                <div class="col-">
                    <button  type="reset"  class="btn btn-outline-primary">
                        {{ __('Discard') }}
                    </button>
                </div>
                <div class="col-1"></div>
                <div class="col-">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
                <div class="col-1"></div>

                <a class="btn btn-danger" href="{{url('/doDelete/'.$user->id)}}" role="button">Delete</a>


            </div>
        </form>

    </div>
</div>
@endsection
    {{--image: {{url('Aset/', Auth::user()->picture)}}--}}