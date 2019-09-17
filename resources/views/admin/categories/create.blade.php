@extends('admin.layout.app')

@section("title") Kategori Artikel @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Buat Kategori Artikel</h6h>
    </div>

    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('kategori.store') }}">
                @csrf

                <div class="form-group">
                    <label>Judul Kategori</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="judul kategori">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</dislugv>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Gambar Kategori</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image" id="image">
                        <label class="custom-file-label" for="image">Pilih Gambar</label>
                    </div>
                </div>


                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </form>
        </div>
    </div>

</div>
@endsection
