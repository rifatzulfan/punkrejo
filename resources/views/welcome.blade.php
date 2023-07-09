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
        <!--==================== HOME ====================-->
        <section class="home" id="home">

            <div class="home_video">
                <video autoplay muted loop>
                    <source src="{{asset('video/profile2.mp4')}}" type="video/mp4">
                </video>


                <div class="home__container container grid">
                    <div class="home__data">
                        <span class="home__data-subtitle">Discover your place</span>
                        <h1 class="home__data-title">Explore The <br> Best <b>Beautiful <br> Destination</b></h1>
                        <a href="#destinasi" class="button">Explore</a>

                    </div>

                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>

                    <div class="home__info">
                        <div>
                            <span class="home__info-title">5 best places to visit</span>
                            <a href="#discover" class="button button--flex button--link home__info-button">
                                More <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>

                        <div class="home__info-overlay">
                            <img src="assets/img/home2.jpg" alt="" class="home__info-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== about ====================-->
        <section class="about section" id="about">

            <div class="about__container container grid">
                <div class="about__data">
                    <h2 class="section__title about__title">Aneka Ragam<br> Destinasi Wisata di Purworejo</h2>
                    <p class="about__description"> Purworejo merupakan kota yang kaya akan wisata , baik wisata alam religi dan wisata budaya
                        Dengan letak greografis yang memiliki dataran rendah dan juga dataran tinggi , Purworejo memiliki destinasi dari pegunungan hingga pemandangan pesesisir selatan , ayo jelajahi wisata yang ada di Purworejo

                    </p>

                    <a href="#place" class="button">Pilih Destinasi</a>
                </div>



                <div class="about__img">
                    <div class="about__img-overlay">
                        <img src="https://ewisata.purworejokab.go.id/public/upload/wisata/goaseplawan.jpg" alt="" class="about__img-one">
                    </div>

                    <div class="about__img-overlay">
                        <img src="{{asset('img/Pantai-Dewa-Ruci.jpg')}}" alt="" class="about__img-two">
                    </div>
                </div>
            </div>
        </section>
        <!--==================== Destinasi ====================-->
        <section class="place section" id="place">
            <h2 class="section__title">Choose Your Destination</h2>

            <div class="container my-4">
                <div class="row gx-3">
                    @foreach ($produks as $produk)
                    <div class="col-4">
                        <div class="card" style="width: 18rem; border:none;">
                            <img src="{{ asset('storage/img/'.$produk->path) }}" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$produk->name}}</h5>
                                <p class="card-text">{{$produk->hari}} | {{$produk->jam}}</p>
                                <p class="card-text">Rp.{{$produk->price}}</p>
                                <p>{{$produk->desc}}</p>
                                <a href="" style="background-color:#884bdd; border:none;" class="btn btn-primary">Beli</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>




            <!--==================== PLACES CARD 2 ====================-->

        </section>
        <!--==================== DISCOVER ====================-->
        <section class="discover section" id="discover">
            <h2 class="section__title">The most <br> attractive places in Purworejo</h2>

            <div class="discover__container container swiper-container">
                <div class="swiper-wrapper">
                    <!--==================== DISCOVER 1 ====================-->
                    <div class="discover__card swiper-slide">
                        <img src="{{asset('img/artatirta.jpg')}}" alt="" class="discover__img">
                        <div class="discover__data">
                            <h2 class="discover__title">Kolam Renang <br> Arta Tirta </h2>
                            <span class="discover__description">24 tours available</span>
                        </div>
                    </div>

                    <!--==================== DISCOVER 2 ====================-->
                    <div class="discover__card swiper-slide">
                        <img src="{{asset('img/discover2.jpg')}}" alt="" class="discover__img">
                        <div class="discover__data">
                            <h2 class="discover__title">Puncak Khayangan Sigendol</h2>
                            <span class="discover__description">15 tours available</span>
                        </div>
                    </div>

                    <!--==================== DISCOVER 3 ====================-->
                    <div class="discover__card swiper-slide">
                        <img src="{{asset('img/discover3.jpg')}}" alt="" class="discover__img">
                        <div class="discover__data">
                            <h2 class="discover__title">Hvar</h2>
                            <span class="discover__description">18 tours available</span>
                        </div>
                    </div>

                    <!--==================== DISCOVER 4 ====================-->
                    <div class="discover__card swiper-slide">
                        <img src="{{asset('img/discover4.jpg')}}" alt="" class="discover__img">
                        <div class="discover__data">
                            <h2 class="discover__title">Mangrove Demang Gedi</h2>
                            <span class="discover__description">32 tours available</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== EXPERIENCE ====================-->
        <section class="experience section">
            <h2 class="section__title">Purworejo <br> City of 1000 story</h2>

            <div class="experience__container container grid">
                <div class="experience__content grid">
                    <div class="experience__data">
                        <h2 class="experience__number">20</h2>
                        <span class="experience__description">Year <br> Experience</span>
                    </div>

                    <div class="experience__data">
                        <h2 class="experience__number">75</h2>
                        <span class="experience__description">Complete <br> tours</span>
                    </div>

                    <div class="experience__data">
                        <h2 class="experience__number">12.000+</h2>
                        <span class="experience__description">Tourist <br> Destination</span>
                    </div>
                </div>

                <div class="experience__img grid">
                    <div class="experience__overlay">
                        <img src="{{asset('img/experience1.jpg')}}" alt="" class="experience__img-one">
                    </div>

                    <div class="experience__overlay">
                        <img src="{{asset('img/experience2.jpg')}}" alt="" class="experience__img-two">
                    </div>
                </div>
            </div>
        </section>

        <!--==================== VIDEO ====================-->
        <section class="video section">
            <h2 class="section__title">Video Tour</h2>

            <div class="video__container container">
                <p class="video__description">Temukan keindahan alam dan juga kebahagiaan ketika berkunjung </p>

                <div class="video__content">
                    <video id="video-file">
                        <source src="{{asset('video/VideoProfile.mp4')}}" type="video/mp4">
                    </video>

                    <button class="button button--flex video__button" id="video-button">
                        <i class="ri-play-line video__button-icon" id="video-icon"></i>
                    </button>
                </div>
            </div>
        </section>


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