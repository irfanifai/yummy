<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="row">

                <!-- Single Post -->
                @foreach ($mainpost->orderBy('id', 'DESC')->limit(1)->get() as $post)
                <div class="col-12">
                    <div class="single-post wow fadeInUp" data-wow-delay=".2s">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <img src="{{ asset($post->featured) }}" alt="Artikel" height="486px;">
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
                                    @php $date = $post->created_at; $date = date( "F j, Y", strtotime($date));@endphp
                                    <div class="post-date">
                                        <a class="text-muted">{{ $date }}</a>
                                    </div>
                                </div>
                                <!-- Post Comment & Share Area -->
                                <div class="post-comment-share-area d-flex">
                                    <!-- Post Comments -->
                                    <div class="post-comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{ $post->comments()->count() }}</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <h2 class="post-headline">{{ $post->title }}</h2>
                            </a>
                            @php $string = $post->body @endphp
                            <p>{!! str_limit($string, $limit = 170, $end = '.') !!}</p>
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}" class="read-more">Lanjutkan Membaca...</a>
                        </div>
                    </div>
                </div>
                @endforeach

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
                                        <a class="text-muted"><i class="fa fa-comment-o" aria-hidden="true"></i> {{ $post->comments()->count() }}</a>
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

                <!-- ******* List Blog Area Start ******* -->

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
                                        <a class="text-muted"><i class="fa fa-comment-o" aria-hidden="true"></i> {{ $post->comments()->count() }}</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
                                <h4 class="post-headline">{{ $post->title }}</h4>
                            </a>
                            @php $string = $post->body @endphp
                            <p>{!! str_limit($string, $limit = 170, $end = '.') !!}</p>
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

                    <img class="mt-5" src="{{ asset('images/promosi1.png') }}" alt="">
                </div>

            </div>
        </div>
    </div>
</div>
