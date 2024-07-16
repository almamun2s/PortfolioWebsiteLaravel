@extends('admin.layout.layout_auth')
@section('title', 'Edit Service')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Service</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Service</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.home.services.update', $service) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-4">Title:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" value="{{ $service->title }}"
                                        placeholder="PSD to HTML" autocomplete="off">
                                    @error('title')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Sub Title:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="sub_title"
                                        value="{{ $service->sub_title }}"
                                        placeholder="I will convert custom design to HTML5" autocomplete="off">
                                    @error('sub_title')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Icon (FontAwesome):</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="icon" value="{{ $service->icon }}"
                                        placeholder="fab fa-html5" autocomplete="off">
                                    @error('icon')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Description:</div>
                                <div class="col-md-8">
                                    <textarea name="description" id="mytextarea">{{ $service->description }}</textarea>
                                    @error('description')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Publish:</div>
                                <div class="col-md-8">
                                    <input type="checkbox" style="cursor: pointer" name="publish"
                                        {{ $service->is_public ? 'checked' : '' }}>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>
                        @can(App\Enum\Permissions::SERVICE_DELETE->value)
                            <form action="{{ route('admin.home.services.destroy', $service) }}" method="post"
                                id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <div class="row mt-4">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-danger" id="delete" value="Delete">
                                    </div>
                                </div>
                            </form>
                        @endcan

                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->
@endsection
