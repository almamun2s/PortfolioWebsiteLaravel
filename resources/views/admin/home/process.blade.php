@extends('admin.layout.layout_auth')
@section('title', 'Update Process')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Process</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Home Process</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.home.process') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-4">Show Process:</div>
                                <div class="col-md-8">
                                    <input type="checkbox" name="process_show" {{ $data->process_show ? 'checked' : '' }}>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Process title:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="process_title"
                                        value="{{ $data->process_title }}" autocomplete="off">
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


        @can('home.process.show')
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Process DataTables
                        @can('home.process.add')
                            <a href="{{ route('admin.home.processes.create') }}" class="float-right btn btn-primary">Add Process</a>
                        @endcan
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    @can('home.process.edit')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    @can('home.process.edit')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($processes as $key => $process)
                                    <tr>
                                        <td>{{ $process->serial }}</td>
                                        <td><i class="{{ $process->icon }}"></i></td>
                                        <td>{{ $process->name }}</td>
                                        <td>{{ $process->description }}</td>
                                        @can('home.process.edit')
                                            <td>
                                                <a href="{{ route('admin.home.processes.edit', $process) }}"
                                                    class="btn btn-warning">Edit</a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endcan



    </div>
    <!-- /.container-fluid -->
@endsection
