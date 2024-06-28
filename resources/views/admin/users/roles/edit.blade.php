@extends('admin.layout.layout_auth')
@section('title', 'Edit Role')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Role</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.update', $role) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row mb-2">
                                <div class="col-md-4">Role Name:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{ $role->name }}"
                                        placeholder="Admin" autocomplete="off">
                                    @error('name')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update Role">
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('admin.roles.destroy', $role) }}" method="post" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <div class="row mt-4">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-danger" id="delete" value="Delete">
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
