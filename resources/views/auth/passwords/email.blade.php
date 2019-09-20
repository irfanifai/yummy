@extends('frontend.app')

@section("title") Lupa Password @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Lupa Password</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">Lupa Password</li>
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

            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <h3 class="text-center mb-4">Lupa Password</h3>

                @if (session('status'))
                <div class="alert alert-info alert-dismissible fade show">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                    </button>
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                @csrf

                    <div class="form-group">
                        <label for="email">{{ __('Masukkan Alamat Email Akun Anda') }}</label>
                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus tabindex="1">

                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-block email text-white" tabindex="4">
                            {{ __('Kirim Link Password Reset') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

            {{-- <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                <div class="card card-primary">
                    <div class="card-header"><h4>{{ __('Lupa Password') }}</h4></div>

                    @if (session('status'))
                    <div class="alert alert-info alert-dismissible fade show mx-4">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                        <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus tabindex="1">

                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div> --}}
@endsection
