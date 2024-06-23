@extends('admin.layout.layout_auth')
@section('title', 'Add Service')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Service</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Service</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dashboard/services') }}" method="post">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-md-4">Title:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="PSD to HTML"
                                        autocomplete="off">
                                    @error('title')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Sub Title:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}"
                                        placeholder="I will convert custom design to HTML5" autocomplete="off">
                                    @error('sub_title')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Icon (FontAwesome):</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="icon" value="{{ old('icon') }}" placeholder="fab fa-html5"
                                        autocomplete="off">
                                        @error('icon')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Description:</div>
                                <div class="col-md-8">
                                    <textarea name="description" id="mytextarea">{{ old('description') }}</textarea>
                                    @error('description')
                                    <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Publish:</div>
                                <div class="col-md-8">
                                    <input type="checkbox" name="publish" checked style="cursor: pointer;">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Add">
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
