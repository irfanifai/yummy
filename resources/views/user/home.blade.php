@extends('frontend.app')

@section("title") Akun Saya @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Akun Saya</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 my-5" style="margin-top:110px !important; margin-bottom:150px !important;">
    <div class="card">

        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" style="background-image: url(../yummy/img/bg-img/image.jpg);">
                    <div class="hero-inner text-center">
                    <h4 class="text-white font-weight-bold">Selamat Datang {{ Auth::user()->name }}
                        @if (File::exists(Auth::user()->avatar))
                            <img class="img-thumbnail ml-5 my-5" src="{{ Auth::user()->avatar }} " width="220px" height="220px" style="margin-left: 210px !important;" alt="Profile" title="Profile">
                        @else
                            <img class="img-thumbnail ml-5 my-5" src="{{ asset('images/no-image.png') }}" width="220px" height="220px" style="margin-left: 210px !important;" alt="Profile" title="Profile">
                        @endif
                    </h4>
                    </div>
                </div>

            </div>
        </div>

        <form enctype="multipart/form-data" method="POST" action="{{route('user.store', ['id'=>$user->id])}}">
            @csrf

            @if (session('status'))
            <div class="col-6 alert alert-info alert-dismissible fade show ml-3">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
            </div>
                @endif

            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="edit-profile-tab" data-toggle="pill" href="#edit-profile" role="tab">Edit Profile</a>
                    </li>
                </ul>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li> --}}

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h4 class="card-title mt-3">{{ $user->name }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
                    </div>
                    <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="mr-5 form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Ganti Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Upload Foto Profile Baru</label>
                            <input type="file" class="form-control-file" name="avatar" id="avatar">
                        </div>

                        <button class="btn btn-primary" type="submit">Update Profile</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection
