@extends('frontend.app')

@section("title") Masuk Akun @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Masuk Akun</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Masuk Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<!-- ****** Archive Area Start ****** -->
<section class="archive-area section_padding_80">
    <div class="container">
        <div class="row">

            {{-- <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>

                    <form class="form-signin">

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus style="height:80px;">
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">{{ __('Password') }}</label>
                            <div class="float-right">
                                @if (Route::has('admin.password.request'))
                                    <a class="text-small" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                    <hr class="my-4">
                    <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                    </form>
                </div>
                </div>
            </div> --}}

            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <h3 class="text-center mb-4">Masuk Akun</h3>
                <p class="text-center">Masuk melalui akun sosial media</p>

                <div class="form-group row text-center mx-auto">
                    <div class="col-md-6 bg-primary">
                        <a href="{{ url('/auth/facebook') }}" class="btn btn-lg text-white">
                            <i class="fab fa-facebook"></i>
                            Facebook
                        </a>
                    </div>
                    <div class="col-md-6 bg-danger">
                        <a href="{{ url('/auth/github') }}" class="btn btn-lg text-white">
                            <i class="fab fa-github"></i>
                            Github
                        </a>
                    </div>
                </div>

                <p class="text-center">Atau masuk dengan akun yang sudah ada</p>
                <form method="POST" action="{{ route('login') }}">
                @csrf

                    <div class="form-group">
                        <label for="email">{{ __('Alamat Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">{{ __('Kata Sandi') }}</label>
                            <div class="float-right">
                            @if (Route::has('admin.password.request'))
                                <a class="text-small" href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" name="password" autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember-me"> {{ __('Ingat Saya') }}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-block text-white login" tabindex="4">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>

                <p class="text-center akun">Belum Punya Akun? <a href="{{ route('register') }}">Daftar Akun</a></p>


            {{-- <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto d-block">

                <div class="card">
                    <div class="card-header"><h4>{{ __('Login') }}</h4></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">{{ __('Password') }}</label>
                                        <div class="float-right">
                                        @if (Route::has('admin.password.request'))
                                            <a class="text-small" href="{{ route('password.request') }}">
                                                {{ __('Lupa Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember-me"> {{ __('Ingat Saya') }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                <div class="form-group row text-center">
                                    <div class="col-md-6">
                                        <a href="{{ url('/auth/facebook') }}" class="btn btn-lg">
                                            <i class="fab fa-facebook"></i>
                                            Facebook
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ url('/auth/github') }}" class="btn btn-lg">
                                            <i class="fab fa-github"></i>
                                            Github
                                        </a>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div> --}}

        </div>
    </div>
</section>
<!-- ****** Archive Area End ****** -->
@endsection
