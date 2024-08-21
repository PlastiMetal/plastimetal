<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLASTIMETAL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/laravel/SisVtaPlastiMetalLV10/resources/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/laravel/SisVtaPlastiMetalLV10/resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="/laravel/SisVtaPlastiMetalLV10/resources/css/responsive.css">
</head>

<body>
    <!-- Header -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img src="/laravel/SisVtaPlastiMetalLV10/resources/images/logo.png" alt="PLASTIMETAL Logo">
                    <span>PLASTIMETAL</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactanos') }}">Contacto</a>
                        </li>
                    </ul>
                    <div class="quote_btn-container">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <!-- Slider Section -->
    <section class="slider_section">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-1">
                                <div class="slider_detail-box">
                                    <h1>SISTEMA DE FACTURACIÓN<br><span>PLASTIMETAL</span></h1>
                                    <h5>Facilitando la gestión de ventas y facturación de manera eficiente y segura.
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="slider_img-box">
                                    <img src="/laravel/SisVtaPlastiMetalLV10/resources/images/slider-img.png"
                                        alt="Sistema de Facturación">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info_section">
        <div class="container">
            <h2>¿Por qué elegirnos?</h2>
            <h5>En PLASTIMETAL, ofrecemos soluciones de facturación personalizadas que se adaptan a las necesidades
                de tu
                negocio. Nuestra plataforma es fácil de usar, segura y eficiente.</h5>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer_section">
        <p>&copy; 2024 All Rights Reserved By <a href="#">PLASTIMETAL</a></p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/laravel/SisVtaPlastiMetalLV10/resources/js/bootstrap.js"></script>
</body>

</html>
