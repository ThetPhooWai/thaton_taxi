@extends('layout.app')
@section('my_title') All Quarters @stop
@section('content')



    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h6><i class="fas fa-map"></i>All Quarters</h6>

                </div>
                <div class="col-sm-7">
                    <form class="row" method="get" action="{{route('search.road')}}">
                        <div class="form-group col-sm-5">
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
                        <div class="form-group col-sm-5">
                            <input type="search" name="search_name" required placeholder="search road" class="form-control">
                        </div>
                        <div class="form-group col-sm-2">
                            <button type="submit" class="btn btn-secondary"><i class="fas fa-search-location"></i></button>
                        </div>
                    </form>

                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-borderless table-hover">
                        @foreach($roads  as $t)
                            <tr class="shadow">
                                <td>
                                    <div class="small text-secondary">
                                        Quarters
                                    </div>
                                    <div class="small">
                                        {{$t->quarter->quarter_name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary">
                                        Roads
                                    </div>
                                    <div class="small">
                                        {{$t->road_name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary">
                                        Actions
                                    </div>
                                    <div>

                                        <a  data-toggle="modal" data-target="#d{{$t->id}}" class="text-danger" href="'#"><i class="fas fa-times-circle"></i> </a>
                                        <a  data-toggle="modal" data-target="#e{{$t->id}}"  href="#"><i class="fas fa-edit"></i></a>
                                    </div>
                                    <div id="e{{$t->id}}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <form method="post" action="{{route('edit')}}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit  </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{$t->id}}">
                                                        <div class="form-group">
                                                            <label for="task_name">Task Name</label>
                                                            <input value="{{$t->quarter_name}}" type="text" name="quarter_name" id="quarter_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    <div id="e{{$t->id}}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirm  </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center text-danger">
                                                        <p> The selected text will drop from database</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#">Agree</a>
                                                    </div>
                                                </div>


                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$roads->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

