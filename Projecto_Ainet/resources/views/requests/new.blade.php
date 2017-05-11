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
                                    </div>
                                </div>

                                <div class="row">
                                    <br>
                                    Stapled:
                                    <div class="pull-right">
                                        <input id="stapled" name="stapled" type="checkbox"/>
                                        <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                    </div>
                                </div>
                            </div>

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
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Tipo do papel:
                                        <select id="paper_type" class="form-control" name="paper_type">
                                            <option disabled selected> -- Rascunho / Normal / Fotográfico -- </option>
                                            <option value=0>Rascunho</option>
                                            <option value=1>Normal</option>
                                            <option value=2>Fotográfico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px;">
                                    <div class="input-group">
                                        Numero de cópias:
                                        <input id="quantity" type="text" name="due_date" class="form-control">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4" style="margin-right: 0%;">
                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Confirms
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