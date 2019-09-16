@extends('authAdmin.app')

@section("title") Admin Login @endsection

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
                                <h1 class="h4 text-gray-900 mb-4">{{ __('Admin Login') }}</h1>
                            </div>

                            <form class="user" method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">{{ __('Ingat Saya') }}</label>
                                    </div>
                                </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Login') }}</button>
                            <hr>

                            </form>

                            <div class="text-center">
                                <a class="small" href="{{ route('admin.password.request') }}">Forgot Password?</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
