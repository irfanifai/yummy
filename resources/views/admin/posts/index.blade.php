@extends('admin.layout.app')

@section("title") Artikel @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6h>
    </div>

    <div class="card">
        <div class="card-body">

        <div class="col-4 float-right mb-4">
            <form action="{{ route('admin.artikel.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="cari berdasarkan judul artikel">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class=" col-8 float-left mb-4">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == NULL && Request::path() == 'admin/artikel' ? 'active' : ''}}" href="{{route('admin.artikel.index')}}">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::get('status') === 'publish'? 'active' : '' }}" href="{{route('admin.artikel.index', ['status' => 'publish'])}}">Publish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == 'draft'? 'active' : '' }}" href="{{route('admin.artikel.index', ['status' => 'draft'])}}">Draft</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::path() == 'admin/artikel/trash' ? 'active' : ''}}" href="{{route('admin.artikel.trash')}}">Trash</a>
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

        <div class="table-responsive text-center">
            <table class="table table-striped table-md">
            <tr>
                <th>#</th>
                <th>Judul Artikel</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! substr($post->title, 0, 20) !!}...</td>
                    <td><img src="{{ asset($post->user->avatar) }}" alt="Foto Profile" width="30" class="rounded-circle mr-1"> {{ $post->user->name }}</td>
                    <td>{{ $post->categorie->name }}</td>
                    <td>
                        @if($post->status == "PUBLISH")
                        <span class="badge badge-success">
                            {{ $post->status }}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{ $post->status }}
                        </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.artikel.edit', ['id' => $post->id]) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('admin.artikel.show', ['id' => $post->id]) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-info"></i></i></a>

                        <form onsubmit="return confirm('Pindahkan artikel ke trash?')" class="d-inline" action="{{route('admin.artikel.destroy', ['id' => $post->id ])}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Trash"><i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <tfoot>
                <tr>
                    <td colspan=10>
                        {{$posts->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>

            </table>
        </div>
    </div>

</div>
@endsection
