@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        @include('shared.errors')
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">User {{$owner_user->name}} Request</div>
                    <div class="panel-body">
                        <div class="row">
                            <img alt="User Pic" src="{{Storage::disk('public')->url('profiles/'.$owner_user->profile_photo)}}" class="img-circle img-responsive"
                            style="width:100px; height: 100px; display: block; margin: 0 auto; ">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Email:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <h5 style="word-wrap: break-word;">
                                    {{$owner_user->email}}
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Contact:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <h5 style="word-wrap: break-word;">
                                    {{$owner_user->phone}}
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>
                                    Department:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <h5 style="word-wrap: break-word;">
                                    {{DB::table('departments')->where('id', $owner_user->department_id)->value('name')}}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Request {{$pedido->id}} Details</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Status:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        @if ($pedido->status == 0)
                                            <h5 style="word-wrap: break-word; background-color: orange;">
                                                Pending
                                            </h5>
                                        @else
                                            <h5 style="word-wrap: break-word; background-color: lawngreen;">
                                                Completed
                                            </h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Description:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            {{$pedido->description}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Data:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            {{$pedido->due_date}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            File:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            {{$pedido->file}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Printer:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            {{\App\Http\Controllers\RequestController::getPrinterName($pedido->printer_id)}}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Colored:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            {{\App\Http\Controllers\RequestController::getColoredStr($pedido->colored)}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Front/Back:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            @if($pedido->front_back)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Stappled:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            @if($pedido->stapled)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Paper Size:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            {{\App\Http\Controllers\RequestController::getSizeStr($pedido->paper_size)}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>
                                            Paper Types:
                                        </h5>
                                    </div>
                                    <div class="col-md-9">
                                        <h5 style="word-wrap: break-word;">
                                            {{\App\Http\Controllers\RequestController::getTypeStr($pedido->paper_type)}}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
