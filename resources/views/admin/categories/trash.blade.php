@extends('admin.layout.app')

@section("title") Kategori @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Trash Kategori</h6h>
    </div>

        <div class="card-body">

        <div class="col-3 float-right mb-4">
            <form action="#">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="cari berdasarkan nama">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-8 float-left mb-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{route('admin.kategori-artikel.index')}}" class="btn btn-primary">Semua Kategori</a>
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
                <th>Foto</th>
                <th>Judul Kategori</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                            @if($categorie->image)
                                <img src="{{ asset($categorie->image) }}" width="50px" height="50px;">
                            @else
                                N/A
                            @endif
                        </td>
                    <td>{{ $categorie->name }}</td>
                    <td>{{ $categorie->slug }}</td>
                    <td>
                        <a href="{{ route('admin.kategori-artikel.restore', ['id' => $categorie->id]) }}" class="btn btn-success">Restore</a>

                        <form onsubmit="return confirm('Hapus kategori artikel secara permanen?')" class="d-inline" action="{{route('admin.kategori-artikel.delete-permanent', ['id' => $categorie->id ])}}" method="POST">
                            @method('delete')
                            @csrf

                            <button type="submit" value="Delete" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <tfoot>
                <tr>
                    <td colspan=10>
                        {{$categories->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>

            </table>
        </div>
    </div>
</div>
@endsection
