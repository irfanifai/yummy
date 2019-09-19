<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="footer-content">
                <!-- Logo Area Start -->
                <div class="footer-logo-area text-center">
                    <a href="{{ url('/') }}" class="yummy-logo">{{ $setting->title }}</a>
                </div>
                <!-- Menu Area Start -->
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-footer-nav" aria-controls="yummyfood-footer-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                    <!-- Menu Area Start -->
                    <div class="collapse navbar-collapse justify-content-center" id="yummyfood-footer-nav">
                        <ul class="navbar-nav">
                            <li class="{{ Request::is('/') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="{{ Request::is('tentangkami') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/tentangkami') }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Kontak</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Copywrite Text -->
            <div class="copy_right_text text-center">
                <p>Copyright @2018 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            </div>
        </div>
    </div>
</div>
