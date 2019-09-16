@extends('authAdmin.app')

@section("title") Reset Password @endsection

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-lg-5 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{ __('Reset Password') }}</h1>
                            </div>

                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                                </button>
                            </div>
                            @endif


                            <form class="user" method="POST" action="{{ route('admin.password.email') }}">
                            @csrf

                                <div class="form-group">
                                    <input id="email" name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Email">

                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
