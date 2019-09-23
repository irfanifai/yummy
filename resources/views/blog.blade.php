@extends('frontend.app')

@section("title") Artikel @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Semua Artikel</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">Semua Artikel</li>
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

            <!-- Single Post -->
            @foreach ($posts as $post)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                    <!-- Post Thumb -->
                    <div class="post-thumb">
                        <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                            <img src="{{ asset($post->featured) }}" alt="">
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

            <div class="col-12">
                <div class="pagination-area d-sm-flex mt-15">
                    <nav aria-label="#">
                        {!! $posts->links('frontend.include._pagination') !!}
                    </nav>
                    <div class="page-status">
                        <p>Halaman {{$posts->currentPage() }} dari {{ $posts->total() }} artikel</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ****** Archive Area End ****** -->
@endsection
