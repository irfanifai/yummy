@extends('admin.layout.app')

@section("title") Tentang Kami @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Tentang Kami</h6h>
    </div>

    <div class="row">
        @foreach ($about as $about)
        <div class="col-md-12">
            <ul class="nav nav-pills justify-content-end">
                <li class="nav-item">
                    <a href="{{ route('admin.tentang-kami.edit', ['id' => $about->id]) }}" class="nav-link">Edit</a>
                </li>
            </ul>

            <div class="card-body">
                <div class="col-md-8 rounded mx-auto d-block">
                    <img src="{{asset($about->featured)}}" class="card-img-top" alt="featured" height="300">
                </div>
                <div class="card-body mt-2">
                    <h3 class="card-title">{{ $about->title }}</h3>
                    <p class="card-text">{!! $about->body !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
