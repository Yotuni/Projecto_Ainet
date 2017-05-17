@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('printers') }}">View All printers</a></li>
            <li><a href="{{ URL::to('printers/create') }}">Create a printer</a>
        </ul>
    </nav>

    <h1>Printers</h1>

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
        @foreach($printers as $printer)
            <tr>
                <td>{{ $printer->id }}</td>
                <td>{{ $printer->name }}</td>
                <td>
                    <!--<a class="btn btn-small btn-success" href="{{-- URL::to('printers/' . $value->id) --}}">Show</a>-->
                    <a class="btn btn-small btn-success" href="{{ URL::to('printers/' . $printer->id . '/edit') }}">Edit</a>
                    <!--<a class="btn btn-small btn-danger" href="{{-- URL::to('printers/' . $value->id . '/remove') --}}">Remove</a>-->
                    {{ Form::open(array('url' => 'printers/' . $printer->id, 'class' => 'pull-right')) }}
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