@extends('admin.layout.app')

@section("title") Kategori @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Daftar Kategori Artikel</h6h>
    </div>

    <div class="card">
        <div class="card-body">

        <div class="col-3 float-right mb-4">
            <form action="{{ route('admin.kategori-artikel.index') }}">
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
                    <a href="{{route('admin.kategori-artikel.create')}}" class="btn btn-primary">Buat Kategori Baru</a>
                </li>
                <li class="nav-item ml-2">
                    <a href="{{route('admin.kategori-artikel.trash')}}" class="btn btn-primary">Trash</a>
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
                        <a href="{{ route('admin.kategori-artikel.edit', ['id' => $categorie->id]) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>

                        <form onsubmit="return confirm('Pindahkan kategori artikel ke trash?')" class="d-inline" action="{{route('admin.kategori-artikel.destroy', ['id' => $categorie->id ])}}" method="POST">
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
                        {{$categories->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>

            </table>
        </div>
    </div>

</div>
@endsection
