@extends('frontend.app')

@section("title") {{ $categorie->name }} @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>{{ $categorie->name }}</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">{{ $categorie->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<section class="blog_area section_padding_0_80 mt-5">
<!-- ****** Archive Area Start ****** -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="row">

                <!-- Single Post -->
                @foreach ($fourpost as $post)
                <div class="col-12 col-md-6">
                    <div class="single-post wow fadeInUp" data-wow-delay=".4s">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <img src="{{ asset($post->featured) }}" alt="Artikel" height="233px;">
                            </a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <div class="post-meta d-flex">
                                <div class="post-author-date-area d-flex">
                                    <!-- Post Author -->
                                    <div class="post-author">
                                        <a class="text-muted">{{ $post->user->name }}</a>
                                    </div>
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        @php $date = $post->created_at; $date = date( "F j, Y", strtotime($date));@endphp
                                        <a class="text-muted">{{ $date }}</a>
                                    </div>
                                </div>
                                <!-- Post Comment & Share Area -->
                                <div class="post-comment-share-area d-flex">
                                    <!-- Post Comments -->
                                    <div class="post-comments">
                                        <a class="text-muted"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <h4 class="post-headline">{{ $post->title }}</h4>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Single Post -->
                @foreach ($posts as $post)
                <div class="col-12">
                    <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <img src="{{ asset($post->featured) }}" alt="Artikel" height="233px;">
                            </a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <div class="post-meta d-flex">
                                <div class="post-author-date-area d-flex">
                                    <!-- Post Author -->
                                    <div class="post-author">
                                        <a class="text-muted">{{ $post->user->name }}</a>
                                    </div>
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        @php $date = $post->created_at; $date = date( "F j, Y", strtotime($date));@endphp
                                        <a class="text-muted">{{ $date }}</a>
                                    </div>
                                </div>
                                <!-- Post Comment & Share Area -->
                                <div class="post-comment-share-area d-flex">
                                    <!-- Post Comments -->
                                    <div class="post-comments">
                                        <a class="text-muted"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <h4 class="post-headline">{{ $post->title }}</h4>
                            </a>
                            <p>{{ strip_tags(substr($post->body, 0, 125)) }}...</p>
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}" class="read-more">Lanjutkan Membaca...</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!-- ****** Blog Sidebar ****** -->
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="blog-sidebar mt-5 mt-lg-0">
                <!-- Single Widget Area -->
                <div class="single-widget-area about-me-widget text-center">
                    <div class="widget-title">
                        <h6>Resep Kekinian</h6>
                    </div>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2TiXwI4Y-iw" allowfullscreen></iframe>
                    </div>
                    <p class="mt-2">Ternyata Sushi Rumahan Gak Kalah Enaknya !!! - Ken & Grat</p>
                    <hr>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sBx-vf5pP_w" allowfullscreen></iframe>
                    </div>
                    <p class="mt-2">Fettucine Carbonara Recipe | STANLEY MARCELLIUS - Kokiku TV</p>
                    <hr>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yu1oHB0fRyY" allowfullscreen></iframe>
                    </div>
                    <p class="mt-2">INKIGAYO SANDWICH | FAVORITNYA K-POP IDOL?? - pufflova</p>
                </div>

                <!-- Single Widget Area -->
                <div class="single-widget-area popular-post-widget">
                    <div class="widget-title text-center">
                        <h6>New Post</h6>
                    </div>
                    <!-- Single Popular Post -->
                    @foreach ($newpost as $post)
                    <div class="single-populer-post d-flex">
                        <img src="{{ asset($post->featured) }}" alt="Artikel Baru">
                        <div class="post-content">
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <h6>{{ $post->title }}</h6>
                            </a>
                            @php $date = $post->created_at; $date = date( "l, F j, Y", strtotime($date));@endphp
                            <p>{{ $date }}</p>
                        </div>
                    </div>
                    @endforeach

                    <img class="mt-5" src="{{ asset('images/promosi1.png') }}" alt="Promosi" title="Promosi">
                    <img class="mt-5" src="{{ asset('images/promosi2.jpg') }}" alt="Promosi" title="Promosi">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ****** Archive Area End ****** -->
</section>
@endsection
