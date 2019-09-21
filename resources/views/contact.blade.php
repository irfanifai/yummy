@extends('frontend.app')

@section("title") Kontak Kami @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Kontak Kami</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<!-- ****** Contatc Area Start ****** -->
<div class="contact-area section_padding_80">
    <div class="container">
        <div class="row">

            <div class="col-12">

                @if (session('status'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif

                <div class="google-map-area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3360290349!2d106.81179081424763!3d-6.219343462644583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6acacf931b1%3A0xdf98ff9897bd3032!2sJl.%20Jend.%20Sudirman%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sen!2sid!4v1567341536553!5m2!1sen!2sid" width="1110" height="450" frameborder="0" style="border:0"></iframe>
                </div>
            </div>
        </div>

        <!-- Contact Info Area Start -->
        <div class="contact-info-area section_padding_80_50">
            <div class="row">
                <!-- Single Contact Info -->
                <div class="col-12 col-md-4 mx-auto">
                    <div class="single-contact-info mb-30 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <h4>Indonesia</h4>
                        <p>{{ $setting->address }}<br> Email: {{ $setting->email }} <br> Phone: {{ $setting->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form  -->
        <div class="contact-form-area">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="contact-form-sidebar item wow fadeInUpBig" data-wow-delay="0.3s" style="background-image: url(../yummy/img/bg-img/contact.jpg);">
                    </div>
                </div>
                <div class="col-12 col-md-7 item">
                    <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                        <h2 class="contact-form-title mb-30">Jika Kamu Punya Pertanyaan Segera Hubungi Kami</h2>
                        <!-- Contact Form -->
                        {!! Form::open(['route' => 'kontak-kami.store', 'method' => 'POST']) !!}
                        @csrf
                            <div class="form-group">
                                {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Nama Lengkap', 'required']) !!}
                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::text('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Alamat Email', 'required']) !!}
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::textarea('message', null, ['id' => 'textarea', 'class' => $errors->has('message') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Pesan', 'required']) !!}
                                @if ($errors->has('message'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn contact-btn">Kirim Pesan</button>
                            <button type="reset" class="btn contact-reset-btn">Hapus</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ****** Contact Area End ****** -->
@endsection
