@extends('admin.layout.layout_auth')
@section('title', 'Edit Social Links')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Social Links</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.socials.update', $link) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row mb-2">
                                <div class="col-md-4">Icon(Font Awesome class)</div>
                                <div class="col-md-8">
                                    <input type="text" name="icon" class="form-control" value="{{ $link->icon }}"
                                        autocomplete="off" placeholder="fab fa-facebook">
                                    @error('icon')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Link:</div>
                                <div class="col-md-8">
                                    <input type="text" name="link" class="form-control" value="{{ $link->links }}"
                                        autocomplete="off" placeholder="https://www.facebook.com/almamun2s">
                                    @error('link')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update Social Link">
                                </div>
                            </div>
                        </form>
                        @can(App\Enum\Permissions::SOCIAL_DELETE->value)
                            <form action="{{ route('admin.socials.destroy', $link) }}" method="post" id="deleteForm">
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
@endsection
