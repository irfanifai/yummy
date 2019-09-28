@extends('admin.layout.app')

@section("title") Komentar @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Detail Komentar</h6h>
    </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <td>ID</td>
                        <td>{{ $comment->id }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pengirim</td>
                        <td>{{ $comment->name }}</td>
                    </tr>
                    <tr>
                        <td>Email Pengirim</td>
                        <td>{{ $comment->email }}</td>
                    </tr>
                    <tr>
                        <td>Isi Komentar</td>
                        <td>{{ $comment->body }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Komentar</td>
                        <td>{{ $comment->created_at }}</td>
                    </tr>
                </table>
            </div>

        </div>
</div>
@endsection
