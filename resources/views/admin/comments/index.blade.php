@extends('admin.layout.app')

@section("title") Komentar @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary"> Daftar Komentar</h6h>
    </div>

    <div class="card">
        <div class="card-body">

        <div class="col-4 float-right mb-4">
            <form action="{{ route('admin.komentar.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="cari berdasarkan nama pengirim">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
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
                <th>Nama Pengirim</th>
                <th>Isi Komentar</th>
                <th>Judul Artikel</th>
                <th>Tanggal Komentar</th>
                <th>Action</th>
            </tr>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>@php $string = $comment->body @endphp {!! str_limit($string, $limit = 20, $end = '.') !!}</td>
                    <td>{{ $comment->post->title }}</td>
                    @php
                    $date = $comment->created_at;
                    $date = date( "d M Y h:i", strtotime($date));
                    @endphp
                    <td>{{ $date }}</td>
                    <td>
                        <a href="{{ route('admin.komentar.show', ['id' => $comment->id]) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i class="fas fa-info"></i></i></a>

                        <form onsubmit="return confirm('Hapus Komentar?')" class="d-inline" action="{{route('admin.komentar.destroy', ['id' => $comment->id ])}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <tfoot>
                <tr>
                    <td colspan=10>
                        {{ $comments->appends(Request::all())->links() }}
                    </td>
                </tr>
            </tfoot>

            </table>
        </div>
    </div>

</div>
@endsection
