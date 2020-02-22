@extends('layout.app')
@section('my_title') Setting @stop

@section('content')

    <div class="card shadow">
        <div class="card-body">
            <h6><i class="fas fa-cog"></i>Setting </h6>
            <hr>
            <div class="row">
                <div class="col-sm-8">
                    <div >
                        <p>
                            <i class="fas fa-user-circle"></i>  Username:{{Auth::User()->name}}
                        </p>

                        <p>
                            <i class="fas fa-envelope-square"></i>  Email:{{Auth::User()->email}}
                        </p>
                        <p>
                            <i class="fas fa-edit"></i>Role:
                        </p>
                        <p>
                            <i class="fas fa-calendar"></i>Member Since:
                            {{Auth::User()->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
                <div class="col-sm-4">

                    <form method="post" action=" {{route('update.password')}}">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control @if($errors->has('current_password')) is-invalid @endif">
                            @if($errors->has('current_password'))
                                <span class="invalid-feedback">{{$errors->first('current_password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control @if($errors->has('new_password')) is-invalid @endif" >
                            @if($errors->has('new_password'))
                                <span class="invalid-feedback">{{$errors->first('new_password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="retype_password">Retype Password</label>
                            <input type="password" name="retype_password" id="retype_password" class="form-control @if($errors->has('retype_password')) is-invalid @endif" >
                            @if($errors->has('retype_password'))
                                <span class="invalid-feedback">{{$errors->first('retype_password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btnlg">Save</button>
                        </div>
                        @csrf

                    </form>
                </div>
            </div>


        </div>
    </div>

    @stop

