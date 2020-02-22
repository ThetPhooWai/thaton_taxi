@extends('layout.app')
@section('my_title') login @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}

                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center text-primary">My Awesome App</h3>
                        <div class="text-center text-secondary mb-5">SingIn user account.</div>
                        <form method="post" action="{{route('logIn')}}">
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif">
                                @if($errors->has('name')) <span class="invalid-feedback">{{$errors->first('name')}}</span> @endif


                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                                @if($errors->has('password')) <span class="invalid-feedback">{{$errors->first('password')}}</span> @endif

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">SignIN</button>
                            </div>
    @csrf
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    Don't have an account? <a href="{{route('Register')}}">SignUp</a>
                </div>
            </div>
        </div>
    </div>

@stop
