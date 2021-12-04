@extends('layouts.app')

@section('content')
<br>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div  class="card" id="sidebar-wrapper" style="background-color: white; width: 250px; margin-left: 3%; height: 80%">
    <br>
    
    <div  style="">
        
        <a href="{{ route('home') }}" class="card" style="border: none; text-align: center; color: black; font-size: 20px;">Home</a> <br>
        <a href="{{ route('profile.edit') }}" class="card" style="border: none; text-align: center; color: black; font-size: 20px;">Edit Profile</a> <br>
        <a href="{{ route('logout') }}" class="card" style="border: none; text-align: center; color: tomato; font-size: 20px;">Logout</a> <br>
    </div>
    </div>
    <!-- /#sidebar-wrapper -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card">
                </div>
                <br>
                <h3 style="height:50px; font-size: 30px; color:#32c9b8; margin-left: 50px; font-weight: bold;">EDIT INFORMATION</h3>
                <br>
                <div style=" height: 200px;" class="rounded">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left;  margin-right:25px; margin-left: 40px;">
                        <br>
                        <form enctype="multipart/form-data" action="{{ route('profile.update_avatar') }}" method="POST" style="margin-top: 80px; ">
                            <input type="file" name="avatar" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary" style="background-color: #32c9b8">
                        </form>
                    </div>
                </div>
                <br>

                <h3 style="height:50px; font-size: 30px; color:#3d3d3d; margin-left: 50px; font-weight: bold;">ACCOUNT INFORMATION</h3>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" value="POST">
                        @method('post')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                    <br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection