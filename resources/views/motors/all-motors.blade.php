@extends('layout.app')
@section('my_title') All Quarters @stop
@section('content')



    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6><i class="fas fa-map"></i>All Motors</h6>

                </div>
                <div class="col-sm-9">
                    <form class="row" method="get" action="{{route('driver.search')}}">
                        <div class="form-group col-sm-3">
                            <select class="custom-select" name="quarter_id" required>
                                <option value="">
                                    Select Quarter
                                </option>
                                @foreach($qtrs as $q)
                                    <option value="{{$q->id}}">
                                        {{$q->quarter_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <select class="custom-select" name="road_id" required>
                                <option value="">
                                    Select Road
                                </option>
                                @foreach($roads as $r)
                                    <option value="{{$r->id}}">
                                        {{$r->road_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="search" name="search_name" required placeholder="search road" class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <button type="submit" class="btn btn-secondary"><i class="fas fa-search-location"></i></button>
                        </div>
                    </form>

                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-borderless table-hover">
                        @foreach($motors  as $m)
                            <tr class="shadow">
                                <td>
                                    <div class="small text-secondary">
                                        Quarters
                                    </div>

                                    <div>
                                        {{$m->quarter->quarter_name}}

                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary">
                                        Roads name
                                    </div>
                                    <div>
                                        {{$m->road->road_name}}



                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary">
                                        Driver Name
                                    </div>
                                    <div>
                                        {{$m->driver_name}}
                                    </div>
                                </td>
                            <td>
                                <div class="small text-secondary">
                                    Action
                                </div>

                                <div>
                                    <a href="#" data-toggle="modal" data-target="#s{{$m->id}}"><i class="fas fa-eye"></i></a>
                                    <a href="#"><i class="fas fa-edit"></i></a>
                                    <a class="text-danger" href="#"><i class="fas fa-times-circle"></i></a>
                                </div>


                                {{--Detail Modal --}}
                                <div  id="s{{$m->id}}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="m-4" >
                                                    <img class="img-thumbnail" src="{{route('driver.photo',['p_name'=>$m->photo])}}">
                                                </div>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><i class="fas fa-user-circle"></i>Driver Name: {{$m->driver_name}}</li>
                                                    <li class="list-group-item"><i class="fas fa-phone-alt"></i>Phone :<a href="tel : {{$m->phone}}">{{$m->phone}}</a> </li>
                                                    <li class="list-group-item"><i class=" fas fa-map"></i>Road :{{$m->road->road_name}}</li>
                                                    <li class="list-group-item"><i class="fas fa-map-pin"></i>Quarter: {{$m->quarter->quarter_name}}</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}
                                </div>
                            </td>


                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

