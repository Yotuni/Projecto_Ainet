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
                                    <input id="due_date" type="date" name="due_date" class="form-control">

                                </div>

                                <div class="row" style="padding: 5px;">
                                    <br>
                                    Stapled:
                                    <div class="pull-right">
                                        <input id="stapled" name="stapled" type="checkbox"/>
                                    </div>
                                </div>

                                <div class="row" style="padding: 5px;">
                                    <br>
                                    Front/Back:
                                    <div class="pull-right">
                                        <input id="front_back" name="front_back" type="checkbox"/>
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
                                                <option value={{$printer->id}}>{{$printer->name}}</option>
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
                                                <option value=0>Monochromatic</option>
                                                <option value=1>Colored</option>
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Tamanho do papel:
                                        <select id="paper_size" class="form-control" name="paper_size">
                                            <option disabled selected> -- A3 / A4 -- </option>
                                            <option value=0>A3</option>
                                            <option value=1>A4</option>
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Tipo do papel:
                                        <select id="paper_type" class="form-control" name="paper_type">
                                            <option disabled selected> -- Draft / Normal / Photografic -- </option>
                                            <option value=0>Draft</option>
                                            <option value=1>Normal</option>
                                            <option value=2>Photografic</option>
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Numero de cópias:
                                        <input id="quantity" type="text" name="quantity" class="form-control">
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