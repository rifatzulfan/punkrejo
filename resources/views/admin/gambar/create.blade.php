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
                <div class="card-header">{{ __('Tambah Gambar') }}</div>


                <div class="card-body">
                    <form method="POST" action="{{ route('gambar.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="path" class="col-md-4 col-form-label text-md-end">{{ __('path Address') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="file" class="form-control @error('path') is-invalid @enderror" name="path" value="{{ old('path') }}" required autocomplete="path">

                                @error('path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection