@extends('admin.layout.app')

@section("title") User Admin @endsection

@section('content')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Detail User Admin</h6h>
    </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Foto Profile</th>
                        {{-- <td>{{ $user->avatar }}</td> --}}
                        @if($user->avatar)
                            <td><img src="{{ asset($user->avatar) }}" alt="Profile" height="250" width="250"></td>
                        @else
                            N/A
                        @endif
                        </tr>
                </table>
            </div>


        </div>

</div>
@endsection
