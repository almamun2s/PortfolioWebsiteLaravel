@extends('admin.layout.layout_auth')
@section('title', 'Social Links')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Social Links</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.socials.store') }}" method="post">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-md-4">Icon(Font Awesome class)</div>
                                <div class="col-md-8">
                                    <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" autocomplete="off"
                                        placeholder="fab fa-facebook">
                                        @error('icon')
                                            <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Link:</div>
                                <div class="col-md-8">
                                    <input type="text" name="link" class="form-control" value="{{ old('link') }}" autocomplete="off"
                                        placeholder="https://www.facebook.com/almamun2s">
                                        @error('link')
                                            <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Add Link">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!-- Service DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Social Links</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($sLinks as $key => $link)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><i class="{{ $link->icon }}"></i></td>
                                    <td><a href="{{ $link->links }}">{{ $link->links }}</a></td>
                                    <td>
                                        <a href="{{ route('admin.socials.edit', $link) }}"
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
@endsection
