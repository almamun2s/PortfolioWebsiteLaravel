@extends('admin.layout.layout_auth')
@section('title', 'Update Service')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Service</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Home Service</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.home.service') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-4">Show Service:</div>
                                <div class="col-md-8">
                                    <input type="checkbox" name="service_show" {{ $data->service_show ? 'checked' : '' }}>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Service Title:</div>
                                <div class="col-md-8">
                                    <input type="text" name="service_title" class="form-control" autocomplete="off"
                                        value="{{ $data->service_title }}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Services at home page:</div>
                                <div class="col-md-8">
                                    <input type="number" name="service_count" class="form-control" autocomplete="off"
                                        value="{{ $data->service_count }}" min="1">
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
