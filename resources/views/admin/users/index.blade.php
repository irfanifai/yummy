@extends('admin.layout.app')

@section("title") User @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Daftar User Web</h6h>
    </div>

        <div class="card-body">

            <div class="col-3 float-right mb-4">
                <form action="#">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('nameuser')}}" name="nameuser" placeholder="cari berdasarkan nama">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>

            <div class=" col-md-8 float-left mb-4">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == NULL && Request::path() == 'admin/user' ? 'active' : ''}}" href="{{route('admin.user.index')}}">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') === 'active'? 'active' : '' }}" href="{{route('admin.user.index', ['status' => 'active'])}}">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::get('status') == 'inactive'? 'active' : '' }}" href="{{route('admin.user.index', ['status' => 'inactive'])}}">Inactive</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::path() == 'admin/user/trash' ? 'active' : ''}}" href="{{route('admin.user.trash')}}">Trash</a>
                    </li>
                </ul>
            </div>

            @if (session('status'))
            <div class="col-6 alert alert-info alert-dismissible fade show mt-5">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
            </div>
            @endif

            <div class="table-responsive mt-2 text-center">
                <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    {{-- <th>Email</th> --}}
                    <th>Dibuat</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($user->avatar)
                                <img src="{{ asset($user->avatar) }}" width="50px">
                            @else
                                <img src="{{ asset('images/tanpa-image.png') }}" width="50px">
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        {{-- <td>{{ $user->email }}</td> --}}
                        <td>{{ $user->created_at->format('d M Y h:i') }}</td>
                        <td>
                            @if($user->status == "ACTIVE")
                            <span class="badge badge-success">
                                {{ $user->status }}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{ $user->status }}
                            </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <a href="{{ route('admin.user.show', ['id' => $user->id]) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-fw fa-info"></i></i></a>

                            <form onsubmit="return confirm('Pindahkan User ke trash?')" class="d-inline" action="{{route('admin.user.destroy', ['id' => $user->id ])}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Trash"><i class="fas fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tfoot>
                    <tr>
                        <td colspan=10>
                            {{ $users->appends(Request::all())->links() }}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>

        </div>
</div>
@endsection
