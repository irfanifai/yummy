@extends('admin.layout.app')

@section("title") Tentang Kami @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit</h6h>
    </div>

    <div class="card">
        <div class="card-body">
            {!! Form::model($about, ['route' => ['admin.tentang-kami.update', $about->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Isi</label>
                    {!! Form::textarea('body', null, ['id' => 'content', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('body'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
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
