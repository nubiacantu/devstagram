<!-- Extender el diseño de la aplicación principal -->
@extends('layouts.app')

<!-- Sección de contenido que se envía al contenedor (yield) -->
@section('contenido')

<!-- Imagen de portada -->
<div class="relative">
  <img src="{{ asset('img/portada3.png') }}" class="w-screen h-auto mx-0">
  <div class="absolute top-1/2 left-0 right-0 flex flex-col items-start justify-center mx-20 transform -translate-y-1/2">
    <h1 class="text-7xl font-bold text-white">Bienvenidos a <br>Devstagram</h1>
    <h2 class="mt-8 text-xl text-semibold text-white">Conéctate, aprende y comparte conocimientos con  <br> otros apasionados por la programación. Únete ahora <br>  y sé parte de esta emocionante red social.</h2>
  </div>
</div>

<!-- Sección de tarjetas -->
<div class="py-8">
  <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
    <dl class="grid grid-cols-1 gap-x-2 gap-y-8 text-center lg:grid-cols-3">
      
      <!-- Tarjeta: Conecta y comparte -->
      <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg rounded-xl p-16 bg-white hover:-translate-y-1 hover:scale-110 duration-300">
        <dt class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Conecta y comparte</dt>
        <dd class="text-base leading-7 text-gray-600">Conecta con otros programadores de todo el mundo, intercambia ideas, comparte soluciones a desafíos técnicos y participa en discusiones interesantes sobre programación.</dd>
      </div>
      
      <!-- Tarjeta: Explora el código -->
      <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg rounded-xl p-16 bg-white hover:-translate-y-1 hover:scale-110 duration-300">
        <dt class="text-base leading-7 text-gray-600">Descubre proyectos innovadores, comparte tus propias creaciones y conéctate con otros programadores apasionados por la tecnología.</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Explora el código</dd>
      </div>
      
      <!-- Tarjeta: Inspírate y motívate -->
      <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg rounded-xl p-16 bg-white hover:-translate-y-1 hover:scale-110 duration-300">
        <dt class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Inspírate y motívate</dt>
        <dd class="text-base leading-7 text-gray-600">Descubre historias de éxito de programadores destacados, aprende de sus experiencias y encuentra motivación para alcanzar tus propias metas y objetivos.</dd>
      </div>
    </dl>
  </div>
</div>

@endsection
