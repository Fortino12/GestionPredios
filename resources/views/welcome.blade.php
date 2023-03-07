@extends('layouts.index')

@section('contenido')
    
<div class="container">
	<section class="banner-area">
		<div class="banner-img"></div>
		<h2>Cultivamos las mejores vainas de vainilla</h2>
		<h3>Para producir un extracto natural de la más alta calidad</h3>
		<a href="{{ route('login') }}" class="banner-btn">Inicia Sesión</a>
	</section>

	<section class="about-area" id="about">
		<h3 class="section-title">Vainilla Gaya</h3>
		<ul class="about-content">
			<li class="about-left"></li>
			<li class="about-right">
				<h2>Especialistas en vainilla desde 1873</h2>
				<p>Somos una empresa familiar desde hace 5 generaciones, ofrecemos al mundo vainilla mexicana, orgullosamente Gaya. Innovamos procesos y contamos con certificados nacionales e internacionales que avalan la calidad de nuestros productos.</p>
				<a href="{{ route('login') }}" class="about-btn">Inicia Sesión</a>
			</li>
		</ul>
	</section>
</div>
@include('layouts.footer')
@endsection
