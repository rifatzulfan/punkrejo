<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="https://ewisata.purworejokab.go.id/public/upload/logo.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">


    <title>Go Purworejo</title>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <div class="d-flex items-center justify-content-between">

                <img src="https://ewisata.purworejokab.go.id/public/upload/logo.png" alt="" style="width: 32px !important; height:32px !important;" width="64" height="64" class="nav_img">

                <a href="#" class="nav__logo mx-2">Go Purworejo </a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list m-0">
                    <li class="nav__item">
                        <a href="index.html" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#place" class="nav__link">Destinasi</a>
                    </li>

                    <li class="nav__item">
                        <a href="Event.html" class="nav__link">Event</a>
                    </li>
                </ul>

                @auth
                <div style="width: 205px; text-align: end;" class="my-4 my-lg-0 nav__link">
                    <a href="{{ auth()->user()->role === 'User' ? '/dashboard-admin/home' : '/home' }}" class="">{{ auth()->user()->name }}</a>
                </div>
                @endauth
                @guest
                <div class="my-4 my-lg-0">
                    <a href="/login" class="btn-primarie"> Login </a>
                </div>
                @endguest

            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-function-line"></i>
            </div>
        </nav>
    </header>

    <main class="main">

        <div class="container my-4">
            <img src="{{asset('storage/img'.$produk->path)}}" alt="" class="img-thumbnail">

            <div class="my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h1>{{$produk->name}}</h1>
                        <h4>{{$produk->hari}} | {{$produk->jam}}</h4>
                    </div>
                    <h2 style="color: #884bdd;">{{$produk->price}}</h2>
                </div>
                <p>{{$produk->desc}}</p>
            </div>
        </div>
        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <div class="footer__data">
                        <h3 class="footer__title">Go Purworejo</h3>
                        <p class="footer__description">choose the <br> destination,
                            we offer you the <br> experience.
                        </p>
                        <div>
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                                <i class="ri-facebook-box-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer__data">
                        <h3 class="footer__subtitle">About</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">About Us</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Features</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">New & Blog</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__data">
                        <h3 class="footer__subtitle">Company</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">Team</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Plan y Pricing</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Become a member</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="footer__rights">
                    <p class="footer__copy">&#169; 2023 Dinas Pemuda Olaharaga dan Pariwisata. All rigths reserved.</p>
                    <div class="footer__terms">
                        <a href="#" class="footer__terms-link">Terms & Agreements</a>
                        <a href="#" class="footer__terms-link">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL===============-->
        <script src="{{asset('js/scrollreveal.min.js')}}"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="{{asset('js/swiper-bundle.min.js')}}"></script>

        <!--=============== MAIN JS ===============-->
        <script src="{{asset('js/main.js')}}"></script>
</body>

</html>