@extends('admin.layout.layout_auth')
@section('title', 'Update Banner')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Banner</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Home Banner</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.home.banner') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-4">Hello:</div>
                                <div class="col-md-8">
                                    <input type="text" name="hi" class="form-control" autocomplete="off" value="{{ $data->hi }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Name:</div>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" autocomplete="off" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Title:</div>
                                <div class="col-md-8">
                                    <input type="text" name="title" class="form-control" autocomplete="off" value="{{ $data->title }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Description:</div>
                                <div class="col-md-8">
                                    <textarea name="description" class="form-control" style="resize: none; height: 6rem;">{{ $data->description }}</textarea>
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
