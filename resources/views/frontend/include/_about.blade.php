<div class="container">
    <div class="row">
        @foreach ($postcategorie as $categorie)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                <img src="{{ asset($categorie->image) }}" alt="" width="350" height="233" style="background-size: cover;">
                <div class="catagory-title">
                    <a href="#">
                        <h5>{{ $categorie->name }}</h5>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-12 col-md-6 col-lg-4">
            <div class="single_catagory wow fadeInUp" data-wow-delay=".6s">
                <img src="{{ asset('yummy/img/catagory-img/2.jpg') }}" alt="">
                <div class="catagory-title">
                    <a href="#">
                        <h5>Cooking</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="single_catagory wow fadeInUp" data-wow-delay=".9s">
                <img src="{{ asset('yummy/img/catagory-img/3.jpg') }}" alt="">
                <div class="catagory-title">
                    <a href="#">
                        <h5>Life Style</h5>
                    </a>
                </div>
            </div>
        </div> --}}
    </div>
</div>
