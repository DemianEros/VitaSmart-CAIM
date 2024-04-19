@extends('layouts.layoutv')

@section('content')
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
@endsection
