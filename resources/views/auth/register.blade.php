@extends('layout.app')
@section('my_title') register @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                @if(Session('info'))
                    <div class="alert alert-success">
                        {{Session('info')}}
                    </div>
                @endif
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center text-primary">My Awesome App</h3>
                    <div class="text-center text-secondary mb-3">SingUp new user account.</div>
                    <form method="post" action="{{route('register')}}">
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif">
                            @if($errors->has('name')) <span class="invalid-feedback">{{$errors->first('name')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @if($errors->has('email')) is-invalid @endif">
                            @if($errors->has('email')) <span class="invalid-feedback">{{$errors->first('email')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                            @if($errors->has('password')) <span class="invalid-feedback">{{$errors->first('password')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control @if($errors->has('confirm_password')) is-invalid @endif">
                            @if($errors->has('confirm_password')) <span class="invalid-feedback">{{$errors->first('confirm_password')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">SignUP </button>
                        </div>
@csrf
                    </form>


                </div>
            </div>
            <div class="mt-3">
                Do you have already Account? Please <a href="login">Sign In</a>
            </div>
                </div>


        </div>

    </div>

@stop
