@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{$user->name}}
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="{{Storage::disk('public')->url('profiles/'.$user->profile_photo)}}" class="img-circle img-responsive">
                            @if (Auth::check() && Auth::user()->id == $user->id)
                                <br>
                                <a href="{{route('edit', [$user->id])}}" class="btn btn-primary btn-sm" style="float: none;">Edit Profile</a>
                            @endif
                        </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Department:</td>
                                    <td>{{ $user->department_id}}</td>
                                </tr>
                                @if (Auth::check() && Auth::user()->id == $user->id)
                                    <tr>
                                        <td>Creation date:</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Profile URL</td>
                                    <td>{{$user->profile_url}}</td>
                                </tr>
                                @if (Auth::check() && Auth::user()->id == $user->id)
                                    <tr>
                                        <td>Number of Prints</td>
                                        <td>{{$user->print_counts}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Presentation</td>
                                    <td>{{$user->presentation}}</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
