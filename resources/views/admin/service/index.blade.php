@extends('admin.layout.layout_auth')
@section('title', 'Services')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Services</h1>
            <div>
                <a href="{{ url('dashboard/services/create') }}" class="btn btn-primary">Add Service Item</a>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Sub title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Sub title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($services as $key => $service)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><i class="{{ $service->icon }}"></i></td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->sub_title }}</td>
                                    <td>
                                        @if ($service->is_public)
                                            <span class="btn btn-success">Published</span>
                                        @else
                                            <span class="btn btn-danger">Archived</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">View</a>
                                        <a href="{{ url("dashboard/services/$service->id/edit") }}" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
