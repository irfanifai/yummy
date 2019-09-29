<div class="container">
    <div class="row">
        <div class="col-5 col-sm-6">
            <!--  Top Social bar start -->
            <div class="top_social_bar">
                <a href="{{ $setting->link_facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="{{ $setting->link_twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="{{ $setting->link_instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="{{ $setting->link_youtube }}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                @if (Auth::check())
                    <p class="ml-5 pt-3">Hi, {{ Auth::user()->name }}</p>
                @endif
            </div>
        </div>
        <!--  Login Register Area -->
        <div class="col-7 col-sm-6">
            <div class="signup-search-area d-flex align-items-center justify-content-end">
                <!-- Search Button Area -->
                <div class="search_button">
                    <a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
                <!-- Search Form -->
                <div class="search-hidden-form">
                    <form action="{{ url('/search') }}" method="get">
                        <input type="search" name="q" id="search-anything" placeholder="Masukkan Judul Artikel disini">
                        <input type="submit" value="" class="d-none">
                        <span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
