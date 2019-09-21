@extends('admin.layout.app')

@section("title") Artikel @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Buat Artikel</h6h>
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.artikel.store') }}">
            @csrf

            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="judul artikel">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Isi Artikel</label>
                {!! Form::textarea('body', null, ['id' => 'content', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('body'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Kategori</label>
                {!! Form::select('categorie_id', ['' => '-']+ App\Categorie::orderBy('name', 'ASC')->pluck('name', 'id')->all() , null, ['class' => $errors->has('categorie_id') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                @if ($errors->has('categorie_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('categorie_id') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Status</label>
                {!! Form::select('status', ['PUBLISH' => 'Publish', 'DRAFT' => 'Draft'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                @if ($errors->has('status'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Gambar Utama</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="featured" id="featured">
                    <label class="custom-file-label" for="featured">Pilih Gambar</label>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </form>
    </div>
</div>
@endsection
