@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('departments') }}">View All departments</a></li>
            <li><a href="{{ URL::to('departments/create') }}">Create a department</a>
        </ul>
    </nav>

    <h1>Edit {{ $department->name }}</h1>

    {{ Html::ul($errors->all()) }}

    {{ Form::model($department, array('route' => array('departments.update', $department->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    <a href="{{ URL::to('departments') }}" class="btn btn-default">Cancel</a>

    {{ Form::close() }}

</div>
@endsection