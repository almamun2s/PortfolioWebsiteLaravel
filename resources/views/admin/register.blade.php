@extends('admin.layout.layout_guest')
@section('title', 'Register')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-2 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fname" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="First Name" autocomplete="off">

                                        @error('fname')
                                            <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control form-control-user"
                                            id="exampleLastName" placeholder="Last Name" autocomplete="off">

                                        @error('lname')
                                            <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Email Address" autocomplete="off">

                                    @error('email')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" autocomplete="off">

                                        @error('password')
                                            <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-user" id="exampleRepeatPassword"
                                            placeholder="Repeat Password" autocomplete="off">
                                    </div>
                                </div>
                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Register Account">
                                {{-- <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
