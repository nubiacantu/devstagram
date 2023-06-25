<!-- crear una directiva para incluir la navegacion-->
@extends('layouts.app')
<!-- crear el contenido que se envia al contenedor(yield)-->
@section('titulo')
    Detalles de la publicacion
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <!-- Imagen de post  -->
    <div class="md:w-4/12 p-5">
        <img src="{{ asset('uploads/'.$post->imagen) }}" alt="Imagen registro de usuarios" class="w-full h-96 shadow-xl rounded-lg">
    </div>
    
    <!-- Detalles de imagen de post -->
    <div class="md:w-5/12 bg-white p-6 rounded-lg shadow-xl h-96 md:h-96 min-h-[0] md:min-h-[0]  ">
        <a href="{{route('post-index',$username) }}" class="flex items-center  text-gray-500 text-sm mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver
        </a>
        <h1 class="text-5xl font-bold mb-7 text-green-700 text-center">{{ $post->titulo }}</h1>
        <div class="flex justify-end w-full mb-7">
                <p class="text-gray-500 text-base mb-1 mr-2">Publicado por: {{ $username }}, </p>
                <p class="text-gray-500 text-base">{{ $post->created_at->diffforHumans() }}</p>
        </div>
        <p class="text-gray-700 text-2xl text-center">{{ $post->descripcion }}</p>
    </div>
</div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white rounded-lg h-full p-5 shadow-xl">
    <div class="mt-5">
        <p class="text-xl font-bold text-center mb-4">Comentarios</p>
    </div>
    @if(session('mensaje'))
        <div class="bg-green-200 p-2 rounded-lg mb-6 text-black text-center ">
            {{ session('mensaje') }}
        </div>
    @endif
    @if(session('success'))
        <div class="bg-green-200 p-2 rounded-lg mb-6 text-black text-center ">
            {{ session('success') }}
        </div>
    @endif
    @guest
        <p class="text-gray-600 uppercase text-sm text-center font-bold">Debes iniciar sesión para poder comentar.</p>
    @endguest 
    @auth
        <!-- crear comentarios solo autenticados-->
        <form action="{{ route('comentarios.store', [ auth()->user()->username,'post'=>$post]) }}" method="POST">
            @csrf
            <div class="">
                <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Escribe un comentario</label>
                <textarea  id="comentario" name="comentario" placeholder="Agrega aquí un comentario" class="border p-3 w-full rounded-lg @error ('comentario') border-red-500 @enderror" value="{{old('descripcion')}}"></textarea>
                @error('comentario')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Comentar" class="bg-green-600 hover:bg-emerald-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    @endauth
    <!--mostrar comentarios de calificacion-->
    <div class="shadow rounded-md my-5 max-h-96 overflow-y-scroll">
        @if($comentarios->count())
            @foreach($comentarios as $comentario)
                <div class="p-5 border-gray-300 border-b grid grid-cols-2">
                    <div>
                        <a href="{{ route('post-index', [$comentario->user->username]) }}" class="font-bold">{{ $comentario->user->username }}</a>
                        <p>{{ $comentario->comentario }}</p>
                        <p class="text-sm text-gray-500">{{ $comentario->created_at->DiffForHumans() }}</p>
                    </div>
                    <div class="flex justify-end items-center">
                        @auth
                            @if($comentario->user->username === auth()->user()->username)
                                <form action="{{ route('comentario-delete', $comentario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Eliminar" class="bg-red-500 hover:bg-red-600 p-1 text-sm rounded text-white mt-4 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        @else
            <p class="p-10 text-center text-gray-700">No hay comentarios aún.</p>
        @endif
    </div>

</div>
       

@endsection
