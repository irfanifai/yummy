@extends('admin.layout.app')

@section("title") Artikel @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Detail Artikel</h6h>
    </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th>ID</th>
                        <td>{{ $posts->id }}</td>
                    </tr>
                    <tr>
                        <th>Penulis</th>
                        <td>{{ $posts->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Upload</th>
                        <td>{{ $posts->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Judul Artikel</th>
                        <td>{{ $posts->title }}</td>
                    </tr>
                    <tr>
                        <th>Isi Artikel</th>
                        <td>{!! $posts->body !!}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $posts->categorie->name }}</td>
                    </tr>
                    <tr>
                        <th>Gambar Utama</th>
                        <td><img src="{{asset($posts->featured)}}" alt="Gambar Utama"  height="450" width="865"></td>
                    </tr>
                </table>
            </div>

        </div>
</div>
@endsection
