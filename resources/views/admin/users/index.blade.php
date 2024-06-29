@extends('admin.layout.layout_auth')
@section('title', 'Users')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users <span
                    class="btn btn-primary rounded-pill disabled">{{ $users->count() }}</span></h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users DataTables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                @can('user.edit')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                @can('user.edit')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->fname }} {{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="btn btn-primary">{{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    @can('user.edit')
                                        <td>
                                            @if (auth()->user()->id == $user->id)
                                                <p>You</p>
                                            @elseif(
                                                $user->hasRole(App\Enum\Super::Admin) &&
                                                    !auth()->user()->hasRole(App\Enum\Super::Admin))
                                                <p>This is Super Admin</p>
                                            @else
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                    class="btn btn-warning">Edit</a>
                                            @endif
                                        </td>
                                    @endcan
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
