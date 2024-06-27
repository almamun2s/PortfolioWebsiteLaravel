@extends('admin.layout.layout_auth')
@section('title', 'Portfolio Category')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category DataTables
                    <a href="{{ route('admin.categories.create') }}" class="float-right btn btn-primary">Add Category</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Portfolios</th>
                                <th>Show on home</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Portfolios</th>
                                <th>Show on home</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->portfolios->count() }}</td>
                                    <td>
                                        @if ($category->is_public)
                                            <span class="btn btn-success">Yes</span>
                                        @else
                                            <span class="btn btn-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category) }}"
                                            class="btn btn-warning">Edit</a>
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
