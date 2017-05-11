@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('departments') }}">View All departments</a></li>
            <li><a href="{{ URL::to('departments/create') }}">Create a department</a>
        </ul>
    </nav>

    <h1>Showing {{ $department->name }}</h1>

    <div class="jumbotron text-center">
        <h2><strong>Name:</strong> {{ $department->name }}</h2>
    </div>

</div>
@endsection