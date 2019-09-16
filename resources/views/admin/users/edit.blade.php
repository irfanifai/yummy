@extends('admin.layout.app')

@section("title") User @endsection

@section('content')
<div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', ['id'=>$user->id])}}">
                    @method('patch')
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-4 col-4">
                            <p class="text-center">Foto Profile Saat Ini</p>
                            <img class="img-thumbnail" src="{{ asset($user->avatar) }}" width="320px" height="280px">
                        </div>
                        <div class="form-group col-md-8 col-8 mt-4">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror <br>
                            <label>Email Pengguna</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror <br>
                            <label>Status</label>
                            {!! Form::select('status', ['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                            @if ($errors->has('status'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif <br>
                            <label class="text-center">Upload Foto Profile Baru</label>
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
