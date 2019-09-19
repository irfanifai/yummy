@extends('admin.layout.app')

@section("title") Setting @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Setting</h6h>
    </div>

    <div class="card">
        <div class="card-body">

        @if (session('status'))
        <div class="col-6 alert alert-info alert-dismissible fade show ml-3">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
        </div>
        @endif

        <form method="POST" action="{{route('settings.store', ['id'=>$setting->id])}}">
            @csrf
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab">Kontak Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-social" role="tab">Akun Social Media</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $setting->title }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tagline">Tagline</label>
                            <input type="text" class="form-control @error('tagline') is-invalid @enderror" name="tagline" id="tagline" value="{{ $setting->tagline }}">
                            @error('tagline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $setting->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $setting->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $setting->address }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
                        <div class="form-group">
                            <label for="link_facebook">Facebook</label>
                            <input type="text" class="form-control @error('link_facebook') is-invalid @enderror" title="link_facebook" id="link_facebook" value="{{ $setting->link_facebook }}">
                            @error('link_facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_twitter">Twitter</label>
                            <input type="text" class="form-control @error('link_twitter') is-invalid @enderror" title="link_twitter" id="link_twitter" value="{{ $setting->link_twitter }}">
                            @error('link_twitter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_instagram">Instagram</label>
                            <input type="text" class="form-control @error('link_instagram') is-invalid @enderror" title="link_instagram" id="link_instagram" value="{{ $setting->link_instagram }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_youtube">Youtube</label>
                            <input type="text" class="form-control @error('link_youtube') is-invalid @enderror" title="link_youtube" id="link_youtube" value="{{ $setting->link_youtube }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Publish</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection
