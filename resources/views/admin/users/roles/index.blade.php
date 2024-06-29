@extends('admin.layout.layout_auth')
@section('title', 'Roles')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roles <span
                    class="btn btn-primary rounded-pill disabled">{{ $roles->count() }}</span></h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Roles DataTables
                    @can('role.add')
                        <a href="{{ route('admin.roles.create') }}" class="float-right btn btn-primary">Add Role</a>
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
                                <th>Permissions</th>
                                @canany(['role.edit', 'role.permission'])
                                    <th>Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                @canany(['role.edit', 'role.permission'])
                                    <th>Action</th>
                                @endcanany
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <span class="btn btn-info btn-sm rounded-pill waves-effect waves-light"
                                                style="display: inline-block;margin:5px;">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    @canany(['role.edit', 'role.permission'])
                                        <td>
                                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-warning">Edit</a>
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
