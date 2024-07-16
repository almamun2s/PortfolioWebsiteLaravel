@extends('admin.layout.layout_auth')
@section('title', 'Update Welcome')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Home Welcome</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.home.welcome') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-4">Welcome Title:</div>
                                <div class="col-md-8">
                                    <input type="text" name="welcome_title" class="form-control" autocomplete="off"
                                        value="{{ $data->welcome_title }}">
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-4">Welcome Description:</div>
                                <div class="col-md-8">
                                    <textarea name="welcome_description" class="form-control" style="resize: none; height: 6rem;">{{ $data->welcome_description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Quality Icon (Fontawesome class):</div>
                                <div class="col-md-8">
                                    <input type="text" name="quality_icon" class="form-control" autocomplete="off"
                                        value="{{ $data->quality_icon }}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Quality Text:</div>
                                <div class="col-md-8">
                                    <textarea name="quality_text" class="form-control" style="resize: none; height: 6rem;">{{ $data->quality_text }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Performance Icon (Fontawesome class):</div>
                                <div class="col-md-8">
                                    <input type="text" name="performance_icon" class="form-control" autocomplete="off"
                                        value="{{ $data->performance_icon }}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Performance Text:</div>
                                <div class="col-md-8">
                                    <textarea name="performance_text" class="form-control" style="resize: none; height: 6rem;">{{ $data->performance_text }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Support Icon (Fontawesome class):</div>
                                <div class="col-md-8">
                                    <input type="text" name="support_icon" class="form-control" autocomplete="off"
                                        value="{{ $data->support_icon }}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Support Text:</div>
                                <div class="col-md-8">
                                    <textarea name="support_text" class="form-control" style="resize: none; height: 6rem;">{{ $data->support_text }}</textarea>
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
    </div>
    <!-- /.container-fluid -->
@endsection
