@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="margin-bottom: 24px;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Go Purworejo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a style="text-decoration: none;" href="/home" class="nav-itemm">Booking</a>
                </li>
                <li class="nav-item mx-2">
                    <a style="text-decoration: none;" href="active" class="nav-itemm">Transaksi</a>
                </li>
                <li class="nav-item mx-2">
                    <a style="text-decoration: none;" href="{{route('produk.index')}}" class="nav-itemm">Produk</a>
                </li>
                <li class="nav-item mx-2">
                    <a style="text-decoration: none;" href="{{route('gambar.index')}}" class="active">Gambar</a>
                </li>
                @if(Auth::user()->role == 'Superadmin')
                <li class="nav-item mx-2">
                    <a style="text-decoration: none;" href="{{route('user.index')}}" class="nav-itemm">User</a>
                </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item d-flex justify-content-center items-baseline">
                    <a id="" class="nav-link mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="">
                        <a class="dropdown-item my-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Gambar') }}</div>

                <div class="card-body">
                    @if ($messages = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="m-0">{{ $messages }}</p>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between items-baseline">
                        <div class="row">
                            <label for="cari" class="col-md-3 col-form-label text-md-end">{{ __('Cari') }}</label>

                            <div class="col-md-8">
                                <input id="cari" type="text" class="form-control @error('cari') is-invalid @enderror" name="cari" value="{{ old('cari') }}" required autocomplete="cari" autofocus>

                                @error('cari')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <a href="{{ route('gambar.create') }}" class="btn btn-primary mx-3">Tambah Gambar</a>
                    </div>

                    <div class="px-3 py-3">
                        <table class="table caption-top">
                            <caption>List of Gambar</caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $iteration = ($gambars->currentPage() - 1) * $gambars->perPage();
                                @endphp
                                @foreach ($gambars as $gambar)
                                <tr>
                                    @php
                                    $iteration++;
                                    @endphp
                                    <th scope="row">{{ $iteration }}</th>
                                    <td>
                                        <img src="{{ asset('storage/img/'.$gambar->path) }}" width="124" alt="">
                                    </td>
                                    <td>{{ $gambar->name }}</td>
                                    <td class="">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('gambar.edit', $gambar->id) }}" class="btn btn-warning btn-sm mx-2">
                                                Edit
                                            </a>
                                            <form action="{{ route('gambar.destroy', $gambar->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div aria-label="Page navigation example" class="mt-4">
                            {!! $gambars->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection