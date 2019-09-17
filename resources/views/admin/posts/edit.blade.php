@extends('admin.layout.app')

@section("title") Artikel @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Artikel</h6h>
    </div>

    <div class="card">
        <div class="card-body">
            {!! Form::model($post, ['route' => ['artikel.update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            @csrf

                <div class="form-group">
                    <label for="title">Judul Artikel</label>
                    {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'autofocus']) !!}
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Isi Artikel</label>
                    {!! Form::textarea('body', null, ['id' => 'body', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('body'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Kategori Artikel</label>
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
                        <input type="file" class="custom-file-input" name="featured" id="featured" accept="image/*" onchange="showMyImage(this)">
                        <label class="custom-file-label" for="featured">Pilih Gambar</label>
                    </div>
                    <img class="createPost" id="thumbnail" src="">
                </div>

                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection
