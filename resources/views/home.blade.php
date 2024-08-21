@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1>Bienvenid@</h1>
            <h2>{{ $user->name }}</h2>
        </div>
        <div class="container">
            <h2 class="text-center">Sobre Nosotros</h2>
            <p class="text-center lead">En PLASTIMETAL, nos especializamos en ofrecer productos de alta calidad en plásticos
                y
                metales para satisfacer las necesidades de nuestros clientes.</p>
            <div class="row mt-5">
                <div class="col-md-4 text-center">
                    <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Misión">
                    <h4>Misión</h4>
                    <p>Proveer soluciones innovadoras en plásticos y metales, comprometidos con la calidad y la satisfacción
                        del
                        cliente.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Visión">
                    <h4>Visión</h4>
                    <p>Ser líderes en el mercado, reconocidos por nuestra innovación, calidad y responsabilidad ambiental.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Valores">
                    <h4>Valores</h4>
                    <p>Calidad, Innovación, Responsabilidad, Satisfacción del cliente y Compromiso social.</p>
                </div>
            </div>
        </div>
    @endsection
