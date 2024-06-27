@extends('admin.layout.layout_auth')
@section('title', 'My Status')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Status</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.status.store') }}" method="post">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-md-4">Name:</div>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        autocomplete="off" placeholder="Laravel">
                                    @error('name')
                                        <p class="text-danger" style="font-size: 0.8rem;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">Value:</div>
                                <div class="col-md-8">
                                    <input type="text" name="value" class="form-control" value="{{ old('value') }}"
                                        autocomplete="off" placeholder="90">
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
                                            <option value="{{ $position->value }}">{{ $position->value }}</option>
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
                                    <input type="submit" class="btn btn-primary" value="Add Status">
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
                                <th>Name</th>
                                <th>Value</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($allStatus as $key => $status)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $status->name }}</td>
                                    <td>{{ $status->curr_value }}</td>
                                    <td>{{ $status->position }}</td>
                                    <td>
                                        <a href="{{ route('admin.status.edit', $status) }}"
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
