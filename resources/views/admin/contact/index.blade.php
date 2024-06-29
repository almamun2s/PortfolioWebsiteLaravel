@extends('admin.layout.layout_auth')
@section('title', 'Messages')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Messages <span
                    class="btn btn-primary rounded-pill disabled">{{ $messages->count() }}</span></h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Message DataTables
                    @can('message.read.all')
                        <a href="{{ route('admin.contact.mark_all_read') }}" class="float-right btn btn-primary">Mark all as
                            read</a>
                    @endcan
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Sent at</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Sent at</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($messages as $key => $message)
                                <tr class=" @if (!$message->read_at) text-primary @endif">
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('admin.contact.details', $message) }}">{{ $message->name }}</a>
                                    </td>
                                    <td>{{ $message->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @can('message.delete')
            <form action="{{ route('admin.contact.delete_all_notifications') }}" method="post" id="deleteForm">
                @csrf
                <div class="row mt-4">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-danger" id="delete" value="Delete All read Notifications">
                    </div>
                </div>
            </form>
        @endcan


    </div>
    <!-- /.container-fluid -->
@endsection
