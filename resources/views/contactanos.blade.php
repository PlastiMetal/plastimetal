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

    <style>
        /* Custom styles */
    </style>
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
                            <a class="nav-link" href="{{ route('welcome') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactanos.blade.php">Contacto</a>
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
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h3>Contáctanos</h3>
                        </div>
                        <div class="card-body">
                            <form action="/enviar-mensaje" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        placeholder="Tu nombre" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Tu correo electrónico" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="asunto">Asunto</label>
                                    <input type="text" name="asunto" id="asunto" class="form-control"
                                        placeholder="Asunto del mensaje" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mensaje">Mensaje</label>
                                    <textarea name="mensaje" id="mensaje" class="form-control" rows="5" placeholder="Tu mensaje" required></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Añadir un poco de estilo personalizado -->

    </section>



    <!-- Footer Section -->
    <footer class="footer_section c">
        <p>&copy; 2024 All Rights Reserved By <a href="#">PLASTIMETAL</a></p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/laravel/SisVtaPlastiMetalLV10/resources/js/bootstrap.js"></script>
</body>

</html>
