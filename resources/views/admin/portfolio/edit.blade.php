@extends('admin.layout.layout_auth')
@section('title', 'Update Portfolio')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Portfolio</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Update <a href="#">{{ $portfolio->title }}</a>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row mb-2">
                                <div class="col-md-4">Title:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $portfolio->title }}" placeholder="Title of the Portfolio"
                                        autocomplete="off">
                                    @error('title')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Slug:</div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="slug" value="{{ $portfolio->slug }}"
                                        placeholder="slug-of-the-portfolio" autocomplete="off">
                                    @error('slug')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-2">
                                <div class="col-md-4">Details:</div>
                                <div class="col-md-8">
                                    <textarea name="details" id="mytextarea">{{ $portfolio->details }}</textarea>
                                    @error('details')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Image:</div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="image" id="image">
                                    @error('image')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-8 my-4">
                                    <img src="{{ $portfolio->getImg() }}" style="max-width: 100%;" alt=""
                                        id="image_preview">
                                </div>
                            </div>



                            <style>
                                .label-info {
                                    background-color: #4e73df;
                                    padding: 0.1rem 0.3rem;
                                    border-radius: 0.5rem;
                                }

                                .bootstrap-tagsinput {
                                    width: 100%
                                }

                                .tt-dataset {
                                    background-color: #4e73df;
                                    color: #ffffff8f;
                                    padding: 0.5rem 1rem;
                                }

                                .tt-cursor {
                                    color: #fff;
                                }
                            </style>
                            <div class="row mb-2">
                                <div class="col-md-4">Tags:</div>
                                <div class="col-md-8">
                                    <input type="text" name="tags" value="{{ $portfolio->tags }}"
                                        placeholder="e.g. Laravel" class="form-control" data-role="tagsinput"
                                        style="width: 100%">
                                    @error('tags')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Categories:</div>
                                <div class="col-md-8">
                                    <input type="text" name="categories" value="2" class="form-control"
                                        id="categories" autocomplete="off" placeholder="Type something">
                                    @foreach ($portfolio->categories as $category)
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#categories').tagsinput('add', {
                                                    "id": {{ $category->id }},
                                                    "name": "{{ $category->name }}",
                                                })
                                            });
                                        </script>
                                    @endforeach
                                    @error('categories')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Publish:</div>
                                <div class="col-md-8">
                                    <input type="checkbox" name="publish" {{ $portfolio->is_public ? 'checked' : '' }}
                                        style="cursor: pointer;">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update Portfolio">
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="post"
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

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

    </div>
    <!-- /.container-fluid -->
@endsection
