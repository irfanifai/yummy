@extends('admin.layout.app')

@section("title") Halaman Dashboard @endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

<!-- Jumlah User Admin -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User Admin</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Admin::count() }}</div>
        </div>
        <div class="col-auto">
            <i class="far fa-user fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Jumlah Artikel -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Artikel</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Post::count() }}</div>
        </div>
        <div class="col-auto">
            <i class="far fa-newspaper fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Jumlah User Web -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User Web</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\User::count() }}</div>
        </div>
        <div class="col-auto">
            <i class="fas fa-user-circle fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Jumlah Komentar User -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Komentar</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
        </div>
        <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>
</div>

<h1 class="h3 mb-0 text-gray-800 mb-4">User Admin</h1>
<div class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                @foreach($admin as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($user->avatar)
                                <img src="{{ asset($user->avatar) }}" width="50px">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->status == "ACTIVE")
                            <span class="badge badge-success">
                                {{ $user->status }}
                            </span>
                            @else
                            <span class="badge badge-danger">
                                {{ $user->status }}
                            </span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                <tfoot>
                    <tr>
                        <td colspan=10>
                            {{ $admin->appends(Request::all())->links() }}
                        </td>
                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-0 text-gray-800 mb-4 mt-4 ml-3">Post Artikel</h1>
<div class="row px-3">
    @foreach($posts as $post)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card mb-5" style="height: 520px;">
                <img src="{{asset($post->featured)}}" class="card-img-top" alt="featured" style="height: 200px;">
                <div class="card-body">
                    <div class="article-title">
                        <p style="height: 20px;"><a href="{{ route('admin.artikel.show', ['id' => $post->id]) }}">{{ $post->title }}</a></p>
                    </div>
                    @php $text = $post->body; $max = 150; $body = substr($text, 0, $max) . '...'; @endphp
                    <p class="card-text pt-5" style="height: 50px;">{{ strip_tags($body) }}...</p>
                </div>
                <div class="article-cta mb-1">
                    <a href="{{ route('admin.artikel.show', ['id' => $post->id]) }}">Baca lebih lajut<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div


@endsection
