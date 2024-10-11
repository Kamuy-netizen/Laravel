<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>maxmedia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('lib/flaticon/font/flaticon.css') }}" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Custom Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <!-- Inline Style -->
    <style>
        hr {
            border: 0;
            height: 90%; 
            background: #333; 
            margin: 20px 0; 
            width: 100%;
        }
    </style>
</head>

<body>
    @yield('content')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

    <!-- Navbar Start -->
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-5">
    <a href="" class="navbar-brand ms-lg-5">
        <img src="{{ asset('img/logmaxmedia.png') }}" alt="logo" style="width: 80%"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="#index" class="nav-item nav-link active">Home</a>
            <a href="#about" class="nav-item nav-link">About</a>
            <a href="#service" class="nav-item nav-link">Service</a>
            <a href="#contact" class="nav-item nav-link">Contact</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Navbar End -->


<!-- Carousel Start -->
<div id="index" class="container-fluid p-0 mb-5">
    <img class="w-100" src="{{ asset('img/bagmaxmax.jpeg') }}" alt="Image" />
</div>
<style>
    .container-fluid {
        position: relative;
    }

    .container-fluid img {
        display: block;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); 
    }
</style>
<!-- Carousel End -->

    <!-- About Start -->
<div id="about" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 450px">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.3s"
                        src="{{ asset('img/ptbang.jpg') }}" alt="About Image" style="object-fit: cover" />
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                    <h1 class="display-5 mb-0">About Us</h1>
                </div>
                <h4 class="text-body fst-italic mb-4">Maximum Media (MAXMEDIA)</h4>
                <p class="mb-4">
                    adalah penyedia jasa Internet dan IT Development. Kami memiliki
                    pengalaman di dunia IT yang memungkinkan kami untuk menyediakan
                    layanan dedicated internet bagi pengguna jasa internet.
                </p>
                <p class="mb-4">
                    Layanan kami cocok untuk kantor, industri, lembaga pendidikan,
                    game center, cafe, maupun instansi pemerintahan. Kami memiliki
                    link backbone langsung ke gedung Cyber atau Indonesia Data Center
                    (IDC), yang memungkinkan kami memberikan layanan yang stabil dan
                    berkualitas.
                </p>
                <p class="mb-4">
                    Dukungan kami tersedia 24 jam sehari, dengan layanan online
                    melalui nomor WhatsApp yang tertera di website kami. Tim kami siap
                    menjaga koneksi internet di tempat Anda.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


    <!-- Services Start -->
    <div id="service" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 mb-0">Our Services</h1>
            </div>
            <div class="row g-5">
            @if($services->count() > 0 )
            @foreach($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12 wow zoomIn" data-wow-delay="0.3s">
                            <div class="service-item bg-light border-bottom border-5 border-primary rounded" style="max-width: 300px; margin: 0 auto;">
                                <div class="position-relative p-3">
                                    <img src="{{ asset('storage/' . $service->image)}}   " class="img-fluid mx-auto d-block" style="width: 100%; max-width: 120px;">
                                    <br>
                                    <h4 class="text-center" style="font-size: 1.1rem;"> {{ $service->name}}</h4>
                                    <p class="text-center" style="font-size: 0.9rem;">{{ $service->deskrpsi}}</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                
                
                    <p>No internet packages available.</p>
                    @endif
            
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- WhatsApp Floating Button with Dropdown -->
    <div class="whatsapp-container">
        <div class="dropdown">
            <button class="whatsapp-float" onclick="toggleDropdown()">
                <i class="fab fa-whatsapp my-float"></i>
            </button>
            <div id="dropdown-content" class="dropdown-content">
                <h5 class="wah5">WhatsApp</h5>
                <a href="https://wa.me/6281315000405" target="_blank" class="dropdown-item">Marketing
                    <br />0813-1500-0405</a>
                <a href="https://wa.me/6287876651273" target="_blank" class="dropdown-item">Marketing
                    <br />0878-7665-1273</a>
                <a href="https://wa.me/6289636887486" target="_blank" class="dropdown-item">Support
                    <br />0812-8703-9387</a>
                <a href="https://wa.me/6281287039387" target="_blank" class="dropdown-item">Support <br />0896-3688-7486
                </a>
                <a href="https://wa.me/6289636887486" target="_blank" class="dropdown-item"></a>
            </div>
        </div>
    </div>
    <!--end wa-->

    <!-- Paket Internet -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 75px">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px">
                <h1 class="display-5 mb-0">Paket Internet</h1>
            </div>
            @if($mbps->count () > 0)
            <div class="row g-5">
            @foreach($mbps as $mp)
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="position-relative border border-primary rounded">
                                <div class="bg-primary text-center pt-5 pb-4">
                                    <h1 class="display-4 text-white">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px"> {{ $mp->name}}</small><small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px"> {{ $mp->deskripsi}}</small>
                                    </h1>
                                </div>
                                <a href=""
                                    class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Order
                                    Now</a>
                            </div>
                        

                <style>
                    .btn:hover, .dropdown-item:hover {
                        background-color: #00008b;
                        color: #fff;
                    }
                    .nav-item.nav-link:hover {
                        color: #00008b !important;
                    }
                    a:hover {
                        color: #00008b;
                    }
                </style>
            </div>
            @endforeach
                        </div>
                    @else
                    <p> kfkskdofk</p>
                    @endif
        </div>
    </div>
    <!-- Paket Internet End -->

    <!-- Why Max -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 mb-0">Mengapa Maxmedia</h1>
            </div>
            <div class="row">

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="text-center pb-4">
                            <img src=" " class="img-fluid mx-auto d-block" style="width: 100%; max-width: 120px;">
                                <div class="testimonial-text bg-light rounded p-4 mt-n5">
                                    <h5 class="text-truncate"></h5>
                                    <p class="mt-3"></p>
                                </div>
                            </div>
                        </div>
                    
                    <p>No testimonials available.</p>
                
            </div>
        </div>
    </div>
    <!-- Why Max End -->

    <!-- Footer Start -->
    <div id="contact" class="container-fluid bg-dark text-light mt-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Branch Office</h3>
                    <div class="d-flex flex-column justify-content-start">
                        Komplek Pinang Griya,<br>
                        Jl. Nuri No. 152D Blok B, Pinang, Kota Tangerang, Banten 15225
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Head Office</h3>
                    <div class="d-flex flex-column justify-content-start">
                        Perkantoran Multiguna,<br>
                        Jl. Bintaro Utama 3A No. 8M,<br>
                        Pondok Karya, Pondok Aren,<br>
                        Kota Tangerang Selatan, Banten 15225.
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>Perkantoran
                        Multiguna, Jl. Bintaro Utama 3A No. 8M, Pondok Karya, Pondok Aren,
                        Kota Tangerang Selatan, Banten 15225.
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>info@maxmedia.co.id
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-telephone text-primary me-2"></i>Marketing <br />
                    </p>
                    0813-1500-0405 (Call or WA) 0878-7665-1273 (Call or WA)
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Follow Us</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2"
                            href="https://www.youtube.com/channel/UCEXPdRavhuw8lVw43L96u_Q"><i
                                class="fab fa-youtube fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2"
                            href="https://web.facebook.com/maxmedia.marketing?_rdc=1&_rdr"><i
                                class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded"
                            href="https://www.instagram.com/maxmedia_id/"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <form class="mx-auto" style="max-width: 600px" action="#" method="POST">
                        
                        <div class="input-group">
                            <input type="email" name="email" class="form-control border-white p-3" placeholder="Your Email" required />
                            <button class="btn btn-primary px-4" type="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary text-light py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">
                        <a class="text-white border-bottom" href="#"></a>Bangsawan
                        Cyberindo - Maximum Media.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0"><a class="text-white border-bottom">MAXmedia</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown-content");
            dropdown.classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.whatsapp-float')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

