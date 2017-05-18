@extends('layouts.app')

@section('content')
<div class="container">

    <h1>
        @if ($title)
            {{$title}}
        @else
            Requests
        @endif
    </h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <div class="row" style="background-color: #aaaaaa;">
            <div class="col-md-1">ID</div>
            <div class="col-md-9">Description</div>
            <div class="col-md-2">Actions</div>
        </div>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <div class="row" style="border: 1px solid; ">
                <div class="col-md-1">{{ $request->id }}</div>
                <div class="col-md-9">{{ $request->description }}</div>
                <div class="col-md-2">
                    <!--<a class="btn btn-small btn-success" href="{{-- URL::to('printers/' . $value->id) --}}">Show</a>-->
                    <a class="btn btn-small btn-success" href="{{ Route('detail', $request->id) }}">Details</a>
                    <a class="btn btn-small btn-success" href="{{ URL::to('requests/' . $request->id . '/edit') }}">Edit</a>
                    <!--<a class="btn btn-small btn-danger" href="{{-- URL::to('printers/' . $value->id . '/remove') --}}">Remove</a>-->
                    {{ Form::open(array('url' => 'requests/' . $request->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </div>
            </div>
        @endforeach
        </tbody>
    </table>

</div>
@endsection