@extends('admin.layout.layout_auth')
@section('title', 'Message Details')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Message Details</h1>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Message Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-4">Name:</div>
                            <div class="col-md-8">{{ $contact->name }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-8"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-4">Message:</div>
                            <div class="col-md-8">{{ $contact->message }}</div>
                        </div>


                        @can('message.delete')
                            <form action="{{ route('admin.contact.destroy', $contact) }}" method="post" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <div class="row mt-4">
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
