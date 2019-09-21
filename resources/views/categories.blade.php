@extends('frontend.app')

@section("title") Tag @endsection

@section('content')
<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(../yummy/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Kategori</h2>
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
                        <li class="breadcrumb-item active" aria-current="page">Tag</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<section class="archive-area section_padding_80">
    <div class="container">
        <div class="row">

            <!-- Single Post -->
            @foreach ($postcategorie as $categorie)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                    <img src="{{ asset($categorie->image) }}" alt="" width="350" height="233" style="background-size: cover;">
                    <div class="catagory-title">
                        <a href="{{ url('/tag/' . $categorie->slug) }}">
                            <h5>{{ $categorie->name }}</h5>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12">
                <div class="pagination-area d-sm-flex mt-15">
                    <nav aria-label="#">
                        {!! $postcategorie->links('frontend.include._pagination') !!}
                    </nav>
                    <div class="page-status">
                        <p>Halaman {{$postcategorie->currentPage() }} dari {{ $postcategorie->total() }} Kategori</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ****** Archive Area End ****** -->
@endsection
