@extends('admin.layout.layout_auth')
@section('title', 'Media')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Media</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Uploads
                    @can(App\Enum\Permissions::MEDIA_ADD->value)
                        <form action="{{ route('admin.media.store') }}" class="float-right" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            <input type="file" name="image[]" multiple>
                            <input type="submit" value="Upload" class="btn btn-primary">
                        </form>
                    @endcan
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($fileDetails as $file)
                        <div class="col-2 text-center mt-2">
                            <img src="{{ url('/uploads/' . $file['name']) }}" alt="No image"
                                style="width:90%;height: auto;max-height: 10rem;">
                            <div style="position: relative; margin-top: 0.5rem;">
                                <textarea class="form-controle" style="width: 100%;height: 2rem; resize: none;">{{ url('/uploads/' . $file['name']) }}</textarea>
                                @can(App\Enum\Permissions::MEDIA_DELETE->value)
                                    <form action="{{ route('admin.media.delete') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="img" value="{{ $file['name'] }}">
                                    </form>
                                    <span
                                        style="position: absolute; width: 40%;height: 2rem; top: 0; right: 0; color: #fff; cursor: pointer;"
                                        class="bg-danger delete">Delete</span>
                                @endcan
                                <span
                                    style="position: absolute; width: 60%;height: 2rem; top: 0; left: 0; background-color: #00AEEF; color: #fff; cursor: pointer;"
                                    class="image">Copy
                                    URL</span>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


@section('customScript')
    <script>
        $(document).ready(function() {
            $('.image').click(function() {
                let imageUrl = $(this).parent().find('textarea').select();
                document.execCommand('copy');
                alert('Text copied to clipboard!');
            });

            $('.delete').click(function() {
                if (confirm('Do you want to delete this?')) {
                    $(this).parent().find('form').submit();
                }
            });
        });
    </script>
@endsection
