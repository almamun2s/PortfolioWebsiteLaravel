@extends('admin.layout.layout_auth')
@section('title', 'Add Role')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Role</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Role</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.store') }}" method="post">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-md-4">Role Name:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Admin"
                                        autocomplete="off">
                                    @error('name')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Add Role">
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
