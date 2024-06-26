@extends('admin.layout.layout_auth')
@section('title', 'Edit Permissions')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Permissions</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Permissions</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.permissions.update', $permission) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row mb-2">
                                <div class="col-md-4">Permissions Name:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}" placeholder="Portfolio"
                                        autocomplete="off">
                                    @error('name')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update Permissions">
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('admin.permissions.destroy', $permission) }}" method="post" id="deleteForm">
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
