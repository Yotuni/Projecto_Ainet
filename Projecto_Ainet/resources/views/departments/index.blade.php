@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('departments') }}">View All departments</a></li>
            <li><a href="{{ URL::to('departments/create') }}">Create a department</a>
        </ul>
    </nav>

    <h1>Departments</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <!--<a class="btn btn-small btn-success" href="{{-- URL::to('departments/' . $value->id) --}}">Show</a>-->
                    <a class="btn btn-small btn-success" href="{{ URL::to('departments/' . $value->id . '/edit') }}">Edit</a>
                    <!--<a class="btn btn-small btn-danger" href="{{-- URL::to('departments/' . $value->id . '/remove') --}}">Remove</a>-->
                    {{ Form::open(array('url' => 'departments/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection