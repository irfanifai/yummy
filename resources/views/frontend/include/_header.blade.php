<div class="container">
    <div class="row">
        <!-- Logo Area Start -->
        <div class="col-12">
            <div class="logo_area text-center">
                <a href="{{ url('/') }}" class="yummy-logo">{{ $setting->title }}</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                <!-- Menu Area Start -->
                <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                    <ul class="navbar-nav" id="yummy-nav">
                        <li class="{{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="{{ Request::is('blog') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                        </li>
                        <li class="{{ Request::is('categorie') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/categorie') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pasta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ice Cream</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sushi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pizza</a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sing out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
