@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-address-card fa-fw"></i> Users Contacts</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Profile</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @if (empty($user->phone))
                                                {{ "Without phone number" }}
                                            @else
                                                {{$user->phone}}
                                            @endif
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="{{route('profile', $user->id)}}" class="btn btn-primary btn-sm" style="float: none;">Profile</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>
                                <div class="pull-left">
                                    {{ $users->links() }}
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('welcome') }}" class="btn btn-default">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection