@extends('layout.app')

@section('my_title') New Roads @stop
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h6><i class="fas fa-plus-circle"></i>New Roads</h6>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    @include('message')
                    <form  enctype="multipart/form-data" method="post" action="{{route('motor.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input accept="image/*" type="file" name="photo" id="photo" class="form-control-file  @if($errors->has('photo')) is-invalid @endif">
                            @if($errors->has('photo'))
                                <span class="invalid-feedback">{{$errors->first('photo')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="driver_name">Driver name</label>
                            <input  type="text" name="driver_name" id="driver_name" class="form-control  @if($errors->has('driver_name')) is-invalid @endif">
                            @if($errors->has('driver_name'))
                                <span class="invalid-feedback">{{$errors->first('driver_name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input  type="tel" name="phone" id="phone" class="form-control  @if($errors->has('phone')) is-invalid @endif">
                            @if($errors->has('phone'))
                                <span class="invalid-feedback">{{$errors->first('phone')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="road"> Select Road </label>
                            <select id="road" name="road" class="custom-select">
                                <option value=" ">Select Road</option>
                                @foreach($roads as $r)
                                    <option value="{{$r->id}}">
                                        {{$r->road_name}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="quarter">Select Quarter</label>
                           <input list="quarter_list" type="text" name="quarter" id="quarter" class="form-control">
                               <datalist id="quarter_list">
                                @foreach($qtrs as $q)
                                    <option value="{{$q->id}}">
                                        {{$q->quarter_name}}
                                    </option>
                                @endforeach
                               </datalist>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
