@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('printers') }}">View All printers</a></li>
            <li><a href="{{ URL::to('printers/create') }}">Create a printer</a>
        </ul>
    </nav>

    <h1>Showing {{ $printer->name }}</h1>

    <div class="jumbotron text-center">
        <h2><strong>Name:</strong> {{ $printer->name }}</h2>
    </div>

</div>
@endsection