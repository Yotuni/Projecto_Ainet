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
                        {!! Form::open(array('route' => array('requests.store', $pedido->id), 'files'=>true)) !!}
                            {{ csrf_field() }}

                            <div class="col-md-6" style="">
                                <div class="row" style="padding: 5px;">
                                    <br>
                                    <div class="input-group">
                                        {!! Form::file('print_file') !!}
                                    </div>
                                    <br>
                                </div>

                                <div class="row" style="padding: 5px;">
                                        Description:
                                    <textarea id="description" type="text" class="form-control" name="description">{{old('description', $pedido->description)}}</textarea>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                        Due Date:
                                    <input id="due_date" type="date" name="due_date" class="form-control" value="{{old('due_date' , $pedido->due_date)}}">

                                </div>

                                <div class="row" style="padding: 5px;">
                                    <br>
                                    Stapled:
                                    <div class="pull-right">
                                        @if (Input::old('stapled') == "1" || $pedido->stapled == "1")
                                            <input id="stapled" name="stapled" type="checkbox" value="1" checked/>
                                        @else
                                            <input id="stapled" name="stapled" type="checkbox" value="1"/>
                                        @endif
                                    </div>
                                </div>

                                <div class="row" style="padding: 5px;">
                                    <br>
                                    Front/Back:
                                    <div class="pull-right">
                                        @if (Input::old('front_back') == "1" || $pedido->front_back == "1")
                                            <input id="front_back" name="front_back" type="checkbox" value="1" checked/>
                                        @else
                                            <input id="front_back" name="front_back" type="checkbox" value="1"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Impressora:
                                        <select id="printer_id" class="form-control" name="printer_id">
                                            <option disabled selected> -- select a printer -- </option>
                                            @foreach ($printers as $printer)
                                                @if (Input::old('printer_id') == $printer->id || $pedido->printer_id == $printer->id)
                                                    <option value="{{ $printer->id }}" selected>{{ $printer->name }}</option>
                                                @else
                                                    <option value="{{ $printer->id }}">{{ $printer->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Cores:
                                        <select id="colored" class="form-control" name="colored">
                                            <option disabled selected> -- Monochromatic / Colored -- </option>
                                            @foreach ($color_types as $key => $val)
                                                @if (Input::old('colored') == $key || $pedido->colored == $key)
                                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Tamanho do papel:
                                        <select id="paper_size" class="form-control" name="paper_size">
                                            <option disabled selected> -- A3 / A4 -- </option>
                                            @foreach ($paper_sizes as $key => $val)
                                                @if (Input::old('paper_size') == $key || $pedido->paper_size == $key)
                                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Tipo do papel:
                                        <select id="paper_type" class="form-control" name="paper_type">
                                            <option disabled selected> -- Draft / Normal / Photografic -- </option>
                                            @foreach ($paper_types as $key => $val)
                                                @if (Input::old('paper_type') == $key || $pedido->paper_type == $key)
                                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Numero de cópias:
                                        <input id="quantity" type="text" name="quantity" class="form-control" value="{{old('quantity', $pedido->quantity)}}">
                                    </div>
                                </div>
                                <br>
                            </div>

                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

                        <a href="{{ URL::to('printers') }}" class="btn btn-default">Cancel</a>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection