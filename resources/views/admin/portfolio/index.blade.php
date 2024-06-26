@extends('admin.layout.layout_auth')
@section('title', 'Portfolios')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Portfolio</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Portfolio DataTables
                    <a href="{{ route('admin.portfolios.create') }}" class="float-right btn btn-primary">Add Portfolio</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Views</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Uploaded</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Views</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Uploaded</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($portfolios as $key => $portfolio)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ $portfolio->getImg() }}" height="100px" width="150px">
                                    </td>
                                    <td><a
                                            href="{{ route('single_portfolio', $portfolio->slug) }}">{{ $portfolio->title }}</a>
                                    </td>
                                    <td>{{ $portfolio->views }}</td>
                                    <td>
                                        @foreach ($portfolio->categories as $category)
                                            <a class="btn btn-info rounded-pill btn-sm"
                                                href="{{ route('portfolio_category', $category->slug) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </td>
                                    <td>
                                        @php
                                            $tags = explode(',', $portfolio->tags);
                                        @endphp
                                        @foreach ($tags as $tag)
                                            <span
                                                class="btn btn-primary rounded-pill btn-sm disabled">{{ $tag }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $portfolio->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($portfolio->is_public)
                                            <span class="btn btn-success">Published</span>
                                        @else
                                            <span class="btn btn-danger">Archived</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}"
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
