@extends('admin.layout.app')

@section("title") User Admin @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Buat User Admin</h6h>
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" method="POST" action="{{ route('useradmin.store') }}">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="nama lengkap">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="user@mail.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password confirmation" placeholder="konfirmasi password">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label>Status</label>
                    {!! Form::select('status', ['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                    @if ($errors->has('status'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-6">
                    <label>Foto Profile</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="avatar" id="avatar">
                        <label class="custom-file-label" for="avatar">Pilih Gambar</label>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </form>
    </div>
</div>
@endsection
