@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        @include('shared.errors')
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{route('update',$user->id)}}">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <div class="col-md-10">
                                <img alt="User Pic" src="
                                @if($user->profile_photo)
                                    {{$user->profile_photo}}
                                @else
                                    https://img.clipartfox.com/92c885a740b3c81c1cdf5e5e3752d86f_facebook-profile-picture-2017-facebook-profile-clipart_1290-1290.jpeg
                                @endif
                                    " class="img-circle img-responsive" style="width: 25%; height: 25%; margin-left: auto;margin-right: auto;" >
                            </div>
                            </div>
                                <br>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{old('email', $user->email)}}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{old('phone', $user->phone)}}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('profile_url') ? ' has-error' : '' }}">
                                <label for="profile_url" class="col-md-4 control-label">Profile Url</label>

                                <div class="col-md-6">
                                    <input id="profile_url" type="text" class="form-control" name="profile_url" value="{{old('profile_url', $user->profile_url)}}" required>

                                    @if ($errors->has('profile_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profile_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('profile_photo') ? ' has-error' : '' }}">
                                <label for="profile_photo" class="col-md-4 control-label">Profile Photo</label>

                                <div class="col-md-6">
                                    <input id="profile_photo" type="text" class="form-control" name="profile_photo" value="{{old('profile_photo', $user->profile_photo)}}" required>

                                    @if ($errors->has('profile_photo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profile_photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('profile_photo') ? ' has-error' : '' }}">
                                <label for="presentation" class="col-lg-4 control-label">Presentation</label>

                                <div class="col-md-6">
                                    <textarea id="presentation" type="text" class="form-control" name="presentation">{{old('presentation', $user->presentation)}}</textarea>
                                    @if ($errors->has('presentation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('presentation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
