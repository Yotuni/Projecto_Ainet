@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        @include('shared.errors')
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Request</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{route('requests.store', $pedido->id)}}">
                            {{ csrf_field() }}

                            <div class="col-md-6" border="1">
                                <div class="row">
                                        Description:
                                    <textarea id="description" type="text" class="form-control" name="description">{{old('description', $pedido->description)}}</textarea>
                                </div>
                                <div class="row">
                                        Due Date:
                                    <input id="due_date" type="date" name="due_date" class="form-control">

                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group">
                                        <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                        Add File&hellip; <input type="file" style="display: none;">
                                        </span>
                                        </label>
                                        <input type="text" class="form-control" value="" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" border="1">
                                <div class="row">
                                    <div class="col-md-6">Ficheiro
                                    </div>
                                    <div class="col-md-6">Ficheiro
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Ficheiro
                                    </div>
                                    <div class="col-md-6">Ficheiro
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Ficheiro
                                    </div>
                                    <div class="col-md-6">Ficheiro
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4" style="margin-right: 0%;">
                                    <button type="submit" class="btn btn-primary" align="left">
                                        Confirm
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection