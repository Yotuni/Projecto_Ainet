@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{Auth::user()->name}}
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="
                        @if(Auth::user()->profile_photo)
                                    {{Auth::user()->profile_photo}}
                        @else
                                    https://img.clipartfox.com/92c885a740b3c81c1cdf5e5e3752d86f_facebook-profile-picture-2017-facebook-profile-clipart_1290-1290.jpeg
                        @endif
                        " class="img-circle img-responsive">
                            <br>
                            <a href="{{route('edit', [Auth::user()->id])}}" class="btn btn-primary btn-sm" style="float: none;">Edit Profile</a>
                        </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Department:</td>
                                    <td>{{DB::table('departments')->where('id', Auth::user()->department_id)->value('name')}}</td>
                                </tr>
                                <tr>
                                    <td>Creation date:</td>
                                    <td>{{Auth::user()->created_at}}</td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td>{{Auth::user()->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Profile URL</td>
                                    <td>{{Auth::user()->profile_url}}</td>
                                </tr>
                                <tr>
                                    <td>Number of Prints</td>
                                    <td>{{Auth::user()->print_counts}}</td>
                                </tr>
                                <tr>
                                    <td>Presentation</td>
                                    <td>{{Auth::user()->presentation}}</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
    </div>
@endsection
