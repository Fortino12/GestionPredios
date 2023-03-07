@extends('layouts.index')

@section('contenido')
    <div class="container">
    <section>
        <div class="login-form">
            <h2>Inicio de Sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-field">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <span></span>
                    <label>Correo Electrónico</label>
                </div>
                <div class="text-field">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <span></span>
                    <label>Contraseña</label>
                </div>
                
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button>Inicia sesión</button>
            </form>
        </div>
	</section>
	</div>
@include('layouts.footer')
@endsection
