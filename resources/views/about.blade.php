@extends('frontend.app')

@section("title") Tentang Kami @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Tentang Kami</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<!-- ****** Archive Area Start ****** -->
<div class="contact-area section_padding_80">

    <div class="container">
        <div class="row">

            <!-- ABOUT  -->
            @foreach ($abouts as $about)
            <div class="col-8 col-md-8 rounded mx-auto d-block">
                <div class="contact-form wow fadeInUpBig" data-wow-delay="2.2s">
                    <img src="{{asset($about->featured)}}" class="card-img-top" alt="featured" height="300">
                </div>
            </div>
            <div class="col-12 col-md-12">
                    <h2 class="contact-form-title text-center mt-5 mb-30">{{ $about->title }}</h2>
                    <p class="card-text">{!! $about->body !!}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>
<!-- ****** Archive Area End ****** -->
@endsection
