@extends('admin.layout.layout_auth')
@section('title', 'Edit process')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit process</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit process</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.home.processes.update', $process) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-4">Name:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{ $process->name }}"
                                        placeholder="Conversation" autocomplete="off">
                                    @error('name')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Icon (FontAwesome):</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="icon" value="{{ $process->icon }}"
                                        placeholder="fab fa-html5" autocomplete="off">
                                    @error('icon')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Description:</div>
                                <div class="col-md-8">
                                    <textarea name="description" class="form-control">{{ $process->description }}</textarea>
                                    @error('description')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Publish:</div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="serial"
                                        value="{{ $process->serial }}">
                                    @error('serial')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('admin.home.processes.destroy', $process) }}" method="post" id="deleteForm">
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
