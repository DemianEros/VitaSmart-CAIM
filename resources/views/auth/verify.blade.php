@extends('layouts.layoutv')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleloader.css">
    <title>Verificación</title>
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificación de Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un link de verificación a tu correo electronico.') }}
                        </div>  
                    @endif

                    {{ __('Antes de continuar, por favor verifica tu email con en link enviado.') }}
                    {{ __('Si no has recibido el email de verificación') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aquí para reenviar el correo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="scriptloader.js"></script>
</body>
</html>
@endsection
