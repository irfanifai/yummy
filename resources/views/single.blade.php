@extends('frontend.app')

@section("title") Detail Blog @endsection

@section('content')
 <!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Detail Blog</h2>
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
                        <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Blog</li>
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
                                            <a href="">{{ $post->user->name }}</a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            @php $date = $post->created_at; $date = date( "F j, Y", strtotime($date));@endphp
                                            <a href="">{{ $date }}</a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Comments -->
                                        <div class="post-comments mr-2">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            <div class="addthis_inline_share_toolbox_xrm1"></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <h2 class="post-headline">{{ $post->title }}</h2>
                                </a>
                                <p>{!! $post->body !!}</p>
                            </div>
                        </div>

                        <!-- Tags Area -->
                        <div class="tags-area">
                            <a href="">{{ $post->categorie->name }}</a>
                        </div>

                        <!-- Related Post Area -->
                        <div class="related-post-area section_padding_50">
                            <h4 class="mb-30">Related post</h4>

                            <div class="related-post-slider owl-carousel">

                                @foreach ($relatedpost as $post)
                                <!-- Single Related Post-->
                                <div class="single-post">
                                    <!-- Post Thumb -->
                                    <div class="post-thumb">
                                        <img src="{{ asset($post->featured) }}" alt="" height="110px;">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <div class="post-meta d-flex">
                                            <div class="post-author-date-area d-flex">
                                                <!-- Post Author -->
                                                <div class="post-author">
                                                    <a href="">{{ $post->user->name }}</a>
                                                </div>
                                                <!-- Post Date -->
                                                <div class="post-date">
                                                    @php $date = $post->created_at; $date = date("d-m-Y", strtotime($date));@endphp
                                                    <a href="">{{ $date }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url('/blog/' . $post->slug) }}">
                                            <h6>{{ $post->title }}</h6>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area section_padding_50 clearfix">
                            <h4 class="mb-30">2 Comments</h4>

                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="img/blog-img/17.jpg" alt="">
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <span class="comment-date text-muted">27 Aug 2018</span>
                                            <h5>Brandon Kelley</h5>
                                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
                                            <a href="#">Like</a>
                                            <a class="active" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <ol class="children">
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-flex">
                                                <!-- Comment Meta -->
                                                <div class="comment-author">
                                                    <img src="img/blog-img/18.jpg" alt="">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content">
                                                    <span class="comment-date text-muted">27 Aug 2018</span>
                                                    <h5>Brandon Kelley</h5>
                                                    <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
                                                    <a href="#">Like</a>
                                                    <a class="active" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="img/blog-img/19.jpg" alt="">
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <span class="comment-date text-muted">27 Aug 2018</span>
                                            <h5>Brandon Kelley</h5>
                                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
                                            <a href="#">Like</a>
                                            <a class="active" href="#">Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>

                        <!-- Leave A Comment -->
                        <div class="leave-comment-area section_padding_50 clearfix">
                            <div class="comment-form">
                                <h4 class="mb-30">Leave A Comment</h4>

                                <!-- Comment Form -->
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-website" placeholder="Website">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn contact-btn">Post Comment</button>
                                </form>
                            </div>
                        </div>
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
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aDuhajDgXYc" allowfullscreen></iframe>
                        </div>
                        <p class="mt-2">RESEP DORAYAKI * Japanese Pancake DORAYAKI - Fun Cooking with Yackikuka</p>
                        <hr>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8M4ixVm1UYw" allowfullscreen></iframe>
                        </div>
                        <p class="mt-2">RESEP OREO CAKE DUA BAHAN - tri pujis</p>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Subscribe &amp; Follow</h6>
                        </div>
                        <div class="subscribe-link">
                            <a href="{{ $setting->link_facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="{{ $setting->link_twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="{{ $setting->link_instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="{{ $setting->link_youtube }}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area popular-post-widget">
                        <div class="widget-title text-center">
                            <h6>New Post</h6>
                        </div>
                        <!-- Single Popular Post -->
                        @foreach ($newpost as $post)
                        <div class="single-populer-post d-flex">
                            <img src="{{ asset($post->featured) }}" alt="">
                            <div class="post-content">
                                <a href="{{ url('/blog/' . $post->slug) }}">
                                    <h6>{{ $post->title }}</h6>
                                </a>
                                @php $date = $post->created_at; $date = date( "l, F j, Y", strtotime($date));@endphp
                                <p>{{ $date }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area add-widget text-center">
                        <div class="add-widget-area">
                            <img src="{{ asset('yummy/img/sidebar-img/6.jpg') }}" alt="">
                            <div class="add-text">
                                <div class="yummy-table">
                                    <div class="yummy-table-cell">
                                        <h2>Buku Memasak</h2>
                                        <p>Beli Buku Sekarang!</p>
                                        <a href="#" class="add-btn">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area newsletter-widget">
                        <div class="widget-title text-center">
                            <h6>Newsletter</h6>
                        </div>
                        <p>Berlangganan Newsletter untuk mendapatkan berbagai macam info, artikel, acara, dan promo terbaru.</p>
                        <div class="newsletter-form">
                            <form action="#" method="post">
                                <input type="email" name="newsletter-email" id="email" placeholder="Masukkan Alamat Email">
                                <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <img class="mt-5" src="{{ asset('images/promosi.png') }}" alt="">
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
