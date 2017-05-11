@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('printers') }}">View All printers</a></li>
            <li><a href="{{ URL::to('printers/create') }}">Create a printer</a>
        </ul>
    </nav>

    <h1>Edit {{ $printer->name }}</h1>

    {{ Html::ul($errors->all()) }}

    {{ Form::model($printer, array('route' => array('printers.update', $printer->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    <a href="{{ URL::to('printers') }}" class="btn btn-default">Cancel</a>

    {{ Form::close() }}

</div>
@endsection