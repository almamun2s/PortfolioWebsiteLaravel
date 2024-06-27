@extends('admin.layout.layout_auth')
@section('title', 'Edit My Status')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Status</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.status.update', $status) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row mb-2">
                                <div class="col-md-4">Name:</div>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" value="{{ $status->name }}"
                                        autocomplete="off" placeholder="Laravel">
                                    @error('name')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Value:</div>
                                <div class="col-md-8">
                                    <input type="text" name="value" class="form-control"
                                        value="{{ $status->curr_value }}" autocomplete="off" placeholder="90">
                                    @error('value')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Position:</div>
                                <div class="col-md-8">
                                    <select name="position" class="form-control text-capitalize">
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->value }}"
                                                {{ $status->position == $position->value ? 'selected' : '' }}>
                                                {{ $position->value }}</option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>




                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Update Status">
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('admin.status.destroy', $status) }}" method="post" id="deleteForm">
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
@endsection
