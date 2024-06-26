@extends('admin.layout.layout_auth')
@section('title', 'Update Category')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Category</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row mb-2">
                                <div class="col-md-4">Name:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                        placeholder="Laravel" autocomplete="off">
                                    @error('name')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Slug:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="slug" value="{{ $category->slug }}"
                                        placeholder="Laravel" autocomplete="off">
                                    @error('slug')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Show on home page:</div>
                                <div class="col-md-8">
                                    <input type="checkbox" {{ $category->is_public ? 'checked' : '' }} name="publish" style="cursor: pointer;">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('admin.categories.destroy', $category) }}" method="post" id="deleteForm">
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
