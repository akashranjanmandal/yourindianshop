<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Your Indian Shop - Sign In Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="/css/slick.css">

        <link href="/css/tooplate-little-fashion.css" rel="stylesheet">

    </head>

    <body>



        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>

        <main>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-togglcsser" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="">
                        <strong>Your <span>Indian</span> Shop</strong>
                    </a>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/api/pricing">Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/api/about">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/api/faq.html">FAQs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/api/contact">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="/api/signup-page" ><span style="font-size:15px">Sign Up</span></a>
                                <!-- <a href="sign-in.html" class="bi-person custom-icon me-3"></a> -->
                            </div>
                    </div>
                </div>
            </nav>

            <section class="sign-in-form section-padding">
            @if(session('success'))
    <div class="alert alert-success">
       <h1> {{ session('success') }}</h1>
    </div>
    @endif
    @if(session('success1'))
    <div class="alert alert-success">
       <h1> {{ session('success') }}</h1>
    </div>
    @endif
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h1 class="hero-title text-center mb-5">Sign In</h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="/api/login">
                                                        @csrf
                                        <div class="form-floating mb-4 p-0">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>

                                            <label for="email">Email address</label>
                                        </div>

                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

                                            <label for="password">Password</label>
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Sign in
                                        </button>

                                        <p class="text-center">Don’t have an account? <a href="sign-up.html">Create One</a></p>

                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

        </main>
        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">Your </a> Indian Shop</h4>
                        <p class="text-white mt-lg-5 mb-4 mb-lg-0"> <strong>Our shop provides you with
                            the best customer support   </strong></p>
                        <br>
                        <p class="copyright-text">Copyright ©  <a href="" target="_blank">TBD</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="/about" class="footer-menu-link">About Us</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Prohibited Items</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-twitter"></a></li>

                            <li><a href="mailto: admin@yourindianshop.com" class="social-icon-link bi-envelope"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="tel: +91 93310 89123" class="social-icon-link bi-phone"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/Headroom.js"></script>
        <script src="/js/jQuery.headroom.js"></script>
        <script src="/js/slick.min.js"></script>
        <script src="/js/custom.js"></script>

    </body>
</html>
