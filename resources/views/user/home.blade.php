@extends('auth.app')

@section("title") Profile @endsection

@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="card">

        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" style="background-image: url('stisla-master/assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg');">
                    <div class="hero-inner text-center">
                    <h4>{{ Auth::user()->name }} <img class="img-thumbnail ml-5" src="{{ asset('stisla-master/assets/img/p-250.png') }}" width="220px" height="220px" style="margin-left: 210px !important;"></h4>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4 ml-4">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-cog"></i> Setting</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route("logout") }}" method="POST" class="nav-link">
                        @csrf
                            <button type="submit" class="btn">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

            {{-- <div class="col-2 mb-4 float-right">
                <form action="{{ route("logout") }}" method="POST">
                @csrf
                    <button type="submit" class="btn">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div> --}}

    </div>
</div>
@endsection
