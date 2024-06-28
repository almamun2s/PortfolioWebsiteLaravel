@extends('admin.layout.layout_auth')
@section('title', 'Edit Profile')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-md-4">First Name:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="fname"
                                        value="{{ auth()->user()->fname }}" placeholder="Abdullah" autocomplete="off">
                                    @error('fname')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Last Name:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="lname"
                                        value="{{ auth()->user()->lname }}" placeholder="Almamun" autocomplete="off">
                                    @error('lname')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Email:</div>
                                <div class="col-md-8">
                                    <input type="email" disabled class="form-control" value="{{ auth()->user()->email }}"
                                        autocomplete="off">
                                        <p>Email and profile picture cannot be changed at this moment.</p>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Password</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row mb-2">
                                <div class="col-md-4">Current Password:</div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="current_password"
                                        placeholder="Enter your Current Password" autocomplete="off">
                                    @error('current_password')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">New Password:</div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter your New Password" autocomplete="off">
                                    @error('password')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Confirm Password:</div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Retype your new Password" autocomplete="off">
                                    @error('password_confirmation')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update Password">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->
@endsection
