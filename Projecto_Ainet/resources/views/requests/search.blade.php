@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        @include('shared.errors')
    @endif
    <div class="container" style="width:100%;">
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Panel</div>
                    <div class="panel-body">
                        <div class="row">
                            {{ Form::open(array('route' => array('requests.store'))) }}
                            <div class="col-md-3">
                                <h5>
                                    Name:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control pull-right" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Expression:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <input id="expression" type="text" class="form-control pull-right" name="expression">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Date:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <input id="date" type="date" class="form-control pull-right" name="date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Department:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <select id="department_id" class="form-control pull-right" name="department_id" style="width: 90%;">
                                    <option selected> -- select an option -- </option>
                                    @foreach ($departments as $department)
                                        <option value={{$department->id}}>{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Status:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <select id="status" class="form-control pull-right" name="status" style="width: 90%;">
                                    <option selected> -- select an option -- </option>
                                    <option value=0>Pending</option>
                                    <option value=1>Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Type:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <select id="type" class="form-control pull-right" name="type" style="width: 90%;">
                                    <option selected> -- select an option -- </option>
                                    <option value=0>Draft</option>
                                    <option value=1>Normal</option>
                                    <option value=2>Photographic</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>




                    </div>
                </div>
            </div>
            <div class="col-md-9 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Requests</div>
                    <div class="panel-body">


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection