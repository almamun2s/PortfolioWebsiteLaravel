@extends('admin.layout.layout_auth')
@section('title', 'Update About')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">About</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update About</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about_page_update') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-2">
                                <div class="col-md-4">About Description:</div>
                                <div class="col-md-8">
                                    <textarea name="about_details" class="form-control">{{ $data->about_details }}</textarea>
                                    @error('about_details')
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
                                    <img src="{{ $data->getImg() }}" style="max-width: 100%;" alt=""
                                        id="image_preview">
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
    </div>
    <!-- /.container-fluid -->
@endsection

@section('customScript')
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
@endsection
