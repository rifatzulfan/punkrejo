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
                    <a style="text-decoration: none;" href="{{route('produk.index')}}" class="active">Produk</a>
                </li>
                <li class="nav-item mx-2">
                    <a style="text-decoration: none;" href="{{route('gambar.index')}}" class="nav-itemm">Gambar</a>
                </li>
                @if(Auth::user()->role == 'Superadmin')
                <li class="nav-item mx-2">
                    <a style="text-decoration: none;" href="active" class="nav-itemm">User</a>
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
                <div class="card-header">{{ __('Dashboard Produk') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="d-flex justify-content-between items-baseline">
                    <div class="row">
                        <label for="Cari" class="col-md-3 col-form-label text-md-end">{{ __('Cari') }}</label>

                        <div class="col-md-8">
                            <input id="cari" type="text" class="form-control @error('cari') is-invalid @enderror" name="cari" value="{{ old('cari') }}" required autocomplete="cari" autofocus>

                            @error('cari')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <a href="{{route('produk.create')}}" class="btn btn-primary mx-3">Tambah Produk</a>
                </div>

                <div class="px-3 py-3">
                    <table class="table caption-top">
                        <caption>List of Produk</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Destinasi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $iteration = ($produks->currentPage() - 1) * $produks->perPage();
                            @endphp
                            @foreach ($produks as $produk)
                            <tr>
                                @php
                                $iteration++;
                                @endphp
                                <th scope="row">{{ $iteration }}</th>
                                <td>{{ $produk->name }}</td>
                                <td> <img src="{{ asset('storage/img/'.$produk->path) }}" width="124" alt=""></td>
                                <td>{{ $produk->price }}</td>
                                <td>{{ $produk->hari }}</td>
                                <td>{{ $produk->jam }}</td>
                                <td class="">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm mx-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    <div aria-label="Page navigation example" class="mt-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection