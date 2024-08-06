<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @if(!@$title)
        {{ config('app.name') }} - Online Reading Platform | As the page turns
        @else

        {{ $title }} | {{ config('app.name') }} - Online Reading Platform

        @endif

    </title>
    
    <link rel="shortcut icon" href="/themes/scholar/images/favicon.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"/>
    <link rel="stylesheet" href="/themes/scholar/css/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/themes/scholar/css/fontawesome.css"/>
    <link rel="stylesheet" href="/themes/scholar/css/style.css"/>
    <link rel="stylesheet" href="/themes/scholar/css/owl.css"/>
    <link rel="stylesheet" href="/themes/scholar/css/animate.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>
<body>
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="/" class="logo">
                        <h1 class="d-flex">
                            <img src="/themes/scholar/images/logo.png" class="l" alt=""/>
                            {{ explode(' ', config('app.name'))[0] }}
                        </h1>
                    </a>
                    <div class="search-input">
                      <form id="search" action="#">
                        <input placeholder="Search ..." id='search' name="search"/>
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <ul class="nav">
                      <li>
                        <a href="/"@if(request()->is('/')) class="active" @endif>Home</a>
                    </li>
                      <li>
                        <a href="/about-us"@if(request()->is(
                            'about-us')) class="active" @endif>About Us</a>
                    </li>
                      <li>
                        <a href="/knetmart"@if(request()->is(
                            'knetmart')) class="active" @endif>Knet Mart</a>
                    </li>
                      <li>
                        <a href="/bookhuts"@if(request()->is(
                            'bookhuts')) class="active" @endif>BookHuts</a>
                    </li>
                      <li>
                        <a href="/publisher/login"@if(request()->is(
                            'publisher/login')) class="active" @endif>Publisher Login</a>
                    </li>
                  </ul>   
                  <a class='menu-trigger'><span>Menu</span></a>
                </nav>
            </div>
        </div>
    </div>
  </header>

  @yield('content')

  <footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 mb-4 mb-md-0">
                <div class="about">
                    <img src="/themes/scholar/images/logo.png" alt=""/> 
                    <b>{{ config('app.name') }}</b>
                    <p>
                        a social and educational online reading habitat where bookworms can plan, co-read, network, chat, talk, and share knowledge and insight without borders as the page turns.
                    </p>

                    <div class="social">
                        <a href="#" target="_blank">
                            <span><i class="fab fa-facebook"></i></span>
                        </a>
                        <a href="#" target="_blank">
                            <span><i class="fab fa-twitter"></i></span>
                        </a>
                        <a href="#" target="_blank">
                            <span><i class="fab fa-instagram"></i></span>
                        </a>
                        <a href="#" target="_blank">
                            <span><i class="fab fa-linkedin"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 mb-4 mb-md-0">
                <h2>Explore</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/contacts">Contacts</a></li>
                    <li><a href="/terms-and-condition">Terms & Conditions</a></li>
                    <li><a href="/privacy">Privacy policy</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mb-4 mb-md-0">
                <h2>Team Up</h2>
                <ul>
                    <li><a href="#">Advertise with us</a></li>
                    <li><a href="#">Authors</a></li>
                    <li><a href="#">Organizations</a></li>
                    <li><a href="#">Education board</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">Governments</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 col-lg-3 mb-0 mb-md-0">
                <h2>Contact Us</h2>
                <ul class="sp">
                    <li><a href="tel:+234 903 1995 380"><i class="fa fa-phone"></i> Phone: +234 903 1995 380</a></li>
                    <li><a href="mailto:info@ebookquet.com"><i class="fa fa-envelope"></i> Enquiry: info@ebookquet.com</a></li>
                </ul>
            </div>
        </div>
        <div class="bottom">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved. <br/> <a href="#" rel="nofollow" target="_blank">{{ config('app.name') }}</a>
        </div>
    </div>
  </footer>

  <script src="/themes/scholar/js/vendor/jquery/jquery.min.js"></script>
  <script src="/themes/scholar/js/isotope.min.js"></script>
  <script src="/themes/scholar/js/owl-carousel.js"></script>
  <script src="/themes/scholar/js/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="/themes/scholar/js/counter.js"></script>
  <script src="/themes/scholar/js/vendor/light-slider/slider.js"></script>
  <script src="/themes/scholar/js/custom.js"></script>
  
</body>
</html>