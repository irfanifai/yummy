@extends('frontend.app')

@section("title") {{ $post->title }} @endsection

@section('content')
 <!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                {{-- <div class="bradcumb-title text-center">
                    <h2>{{ $post->title }}</h2>
                </div> --}}
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
                        <li class="breadcrumb-item"><a href="{{ url($post->categorie->slug) }}">{{ $post->categorie->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<!-- ****** Single Blog Area Start ****** -->
<section class="single_blog_area section_padding_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row no-gutters">

                    <!-- Single Post -->
                    <div class="col-10 col-sm-11">

                        @if (session('status'))
                        <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('status') }}</strong>
                        </div>
                        @endif

                        <div class="single-post">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="{{ asset($post->featured) }}" alt="" height="446px;">
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
                                        <div class="post-comments mr-2">
                                            <a class="text-muted"><i class="fa fa-comment-o" aria-hidden="true"></i> {{ $post->comments()->count() }}</a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            <div class="addthis_inline_share_toolbox_xrm1"></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                    <h2 class="post-headline">{{ $post->title }}</h2>
                                </a>
                                <p>{!! $post->body !!}</p>
                            </div>
                        </div>

                        <!-- Tags Area -->
                        <div class="tags-area">
                            <a href="{{ url($post->categorie->slug) }}">{{ $post->categorie->name }}</a>
                        </div>

                        <!-- Related Post Area -->
                        <div class="related-post-area section_padding_50">
                            <h4 class="mb-30">Related post</h4>

                            <div class="related-post-slider owl-carousel">

                                @foreach ($relatedpost as $related)
                                <!-- Single Related Post-->
                                <div class="single-post">
                                    <!-- Post Thumb -->
                                    <div class="post-thumb">
                                        <img src="{{ asset($related->featured) }}" alt="" height="150px;">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <div class="post-meta d-flex">
                                            <div class="post-author-date-area d-flex">
                                                <!-- Post Author -->
                                                <div class="post-author">
                                                    <a class="text-muted">{{ $related->user->name }}</a>
                                                </div>
                                                <!-- Post Date -->
                                                <div class="post-date">
                                                    @php $date = $related->created_at; $date = date("d-m-Y", strtotime($date));@endphp
                                                    <a class="text-muted">{{ $date }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url( $related->categorie->slug . '/' . $related->slug) }}">
                                            <h6>{{ $related->title }}</h6>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area section_padding_50 clearfix">
                            <h4 class="mb-30">{{ $post->comments()->count() }} Komentar</h4>

                            <ol>
                                <!-- Single Comment Area -->
                                @foreach ($comments  as $comment)
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            @if ($comment->user()->first()->avatar)
                                                <img src="{{ asset($comment->user()->first()->avatar) }}" alt="Profile" title="Profile">
                                            @else
                                                <img src="{{ asset('images/user.svg') }}" alt="Profile" title="Profile">
                                            @endif
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <span class="comment-date text-muted">{{ date('j F Y', strtotime($comment->created_at)) }}</span>
                                            <h5>{{ $comment->name }}</h5>
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                </li>

                                @endforeach

                                <div class="pagination-area d-sm-flex mt-15">
                                    {{ $comments->links('frontend.include._pagination') }}
                                </div>

                            </ol>
                        </div>

                        @if (Auth::check())
                        <!-- Leave A Comment -->
                        <div class="leave-comment-area section_padding_50 clearfix">
                            <div class="comment-form">
                                <h4 class="mb-30">Tulis Komentar</h4>

                                <!-- Comment Form -->
                                {!! Form::open(['route' => ['post.comment', $post->categorie->slug, $post->slug], 'method' => 'POST']) !!}
                                @csrf
                                    <div class="form-group">
                                        {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Nama Lengkap']) !!}
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="margin-top: 10px !important;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Email Address']) !!}
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="margin-top: 10px !important;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::textarea('body', null, ['id' => 'textarea', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Isi Komentar']) !!}
                                        @if ($errors->has('body'))
                                        <span class="invalid-feedback" style="margin-top: 10px !important;">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn contact-btn">Kirim Komentar</button>
                            {{ Form::close() }}
                            </div>
                        </div>
                        @else
                            <p class="mt-2">Masuk untuk tulis komentar <a href="{{ route('login') }}">Masuk</a></p>
                        @endif

                    </div>

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
</section>

@endsection
