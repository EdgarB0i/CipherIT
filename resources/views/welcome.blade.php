<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CipherIT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/key.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+20&family=Jersey+20+Charted&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&family=Concert+One&family=Jersey+20&family=Jersey+20+Charted&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Ojuju:wght@200..800&family=Ruda:wght@400..900&family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem; border-top-color: rgb(11, 169, 227); border-left-color: rgb(11, 169, 227); border-right-color: rgb(11, 169, 227);border-bottom-color: transparent;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <h2 class="m-1" style="color: rgb(11, 169, 255); font-family: 'Ruda', sans-serif">CipherIT</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="#services-section" class="nav-item nav-link">Services</a>
                <a href="#about-section" class="nav-item nav-link">About</a>
                @guest
                <!-- If the user is not authenticated (guest) -->
                <a href="/register" class="nav-item nav-link">Register</a>
                <a href="/login" class="nav-item nav-link">Sign In</a>
                @else
                <!-- else -->
                <a href="profile" class="nav-item nav-link">Profile</a>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Notes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('notes.create') }}">Create Notes</a></li>
                        <li><a class="dropdown-item" href="{{ route('notes.index') }}">View Notes</a></li>
                    </ul>
                </li>

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-item nav-link">Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                @endguest
            </div>
        </div>
    </nav>


    <!-- Navbar End -->
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="carousel-inner" style="padding-bottom: 300px;">
                    <!-- Adjusted padding-top value to move text higher -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Secure Your Notes With CipherIT</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Encrypting your data, protecting your privacy. CipherIT provides the best cryptosystem to ensure your sense of security.</p>
                                <!-- Success Toast Message -->
                                <br>
                                <br>
                                <br>
                                <br>
                                <!-- Success message container -->
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        @if(session('success'))
                                            <div class="alert alert-success mt-7 text-center" id="successMessage">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var successMessage = document.getElementById('successMessage');
                                        if (successMessage.textContent.trim() !== '') {
                                            // Show the message
                                            successMessage.style.display = 'block';
                                           
                                            setTimeout(function () {
                                                successMessage.style.display = 'none';
                                                window.location.href = '/';
                                            }, 2500);
                                        }
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                <div class="carousel-inner" style="padding-bottom: 300px;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Stay Hidden, Stay Safe</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Your privacy is our top priority. With CipherIT, you can trust that your sensitive information is safeguarded using the latest encryption technologies.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-3.jpg" alt="">
                <div class="carousel-inner" style="padding-bottom: 300px;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Experience the Future of Security</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Unlock innovation and peace of mind. Our advanced security solutions keep you ahead of threats.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->



    <!-- Services Start -->
    <div id="services-section" class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: white;">
                                <img class="img-fluid" src="img/icon/icon-3.png" alt="Icon">
                            </div>
                            <h1 class="display-1 mb-0" style="color: white;">01</h1>
                        </div>
                        <h5 class="text-white">Authenticated Registration</h5>
                        <hr class="w-25">
                        <span>We offer a secure user authentication system, ensuring that credentials are encrypted, hashed and stored safely.</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: white;">
                                <img class="img-fluid" src="img/icon/icon-4.png" alt="Icon">
                            </div>
                            <h1 class="display-1 mb-0" style="color: white;">02</h1>
                        </div>
                        <h5 class="text-white">Modern Cryptosystems</h5>
                        <hr class="w-25">
                        <span>Advanced encryption and decryption services for all forms of user data that are visible to none other.</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: white;">
                                <img class="img-fluid" src="img/icon/icon-2.png" alt="Icon">
                            </div>
                            <h1 class="display-1 mb-0" style="color: white;">03</h1>
                        </div>
                        <h5 class="text-white">Secure Notepad</h5>
                        <hr class="w-25">
                        <span>We provide a platform for storing notes through cryptosystems.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Services End -->

    <!-- About Start -->
    <div id="about-section" class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/about.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px; background-color: rgb(11, 169, 255);"></div>
                        <h1 class="display-5 mb-4">About Us</h1>
                        <p class="mb-4 pb-2">Driven by a deep concern for digital privacy in an era of constant surveillance, our mission at CipherIT is to empower individuals and businesses to protect their data from prying eyes and unauthorized access. With our implementation of secure and modern cybersystems, we're dedicated to ensuring your privacy and security in an increasingly interconnected world. Join us in our quest to safeguard your digital life and build a more secure future.</p>
                        <div class="row g-4 mb-4 pb-3">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="img/icon/icon-1.png" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <h2 class="mb-1" data-toggle="counter-up">1445</h2>
                                            <p class="fw-medium mb-0" style="color: rgb(11, 169, 255);">5 Star Reviews</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="img/icon/icon-5.png" alt="Icon">
                                    </div>
                                    <div class="ms-4">
                                        <h2 class="mb-1" data-toggle="counter-up">2200</h2>
                                        <p class="fw-medium mb-0" style="color: rgb(11, 169, 255);">Protected Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn rounded-pill py-3 px-5" style="background-color: rgb(11, 169, 255); color: white;">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- About End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Dhaka, Bangladesh</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+88012345678</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>CipherIT@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Our Solutions</h5>
                    <a class="btn btn-link" href="">User Authentication</a>
                    <a class="btn btn-link" href="">Data Encryption</a>
                    <a class="btn btn-link" href="">Secure Messaging</a>
                    <a class="btn btn-link" href="">Key Management</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="#about-section">About Us</a>
                    <a class="btn btn-link" href="">Support</a>
                    <a class="btn btn-link" href="#services-section">Our Services</a>
                    <a class="btn btn-link" href="">Rate Us</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Get insider access! Subscribe to our newsletter today.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email" style="caret-color: blue;">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" style="background-color: rgb(11, 169, 227);">SignUp</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid py-4" style="background: #000000;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#" style="color: rgb(11, 169, 227);">CipherIT</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Developed By <a class="border-bottom" href="https://github.com/EdgarB0i" style="color: rgb(11, 169, 227);">Abid</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top" style="border-color: white; background-color: rgb(11, 169, 255); display: none;">
        <i class="bi bi-arrow-up" style="color: white; font-size: 1.5rem;"></i>
    </a>

    <script>
        window.addEventListener('scroll', function() {
            var arrow = document.querySelector('.back-to-top');
            if (window.scrollY > 100) {
                arrow.style.display = 'flex';
            } else {
                arrow.style.display = 'none';
            }
        });
    </script>
    <!-- Back to Top End -->
    


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>