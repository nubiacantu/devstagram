<!-- crear una directiva para incluir la navegacion-->
@extends('layouts.app')
<!-- crear el contenido que se envia al contenedor(yield)-->
@section('titulo')
    Crear nueva publicación
@endsection
<!--directiva para integrar los estilos de dropzone-->
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush

@section('contenido')
   <div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10 p-10 ">
        <form action="{{route('imagenes.store')}}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded shadow-xl flex flex-col justify-center items-center  bg-white">
            @csrf
        </form> 
    </div>
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mr-10">
        <form action="{{route('post.create')}}" method="post" novalidate>
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                    titulo
                </label>
                <input 
                    id="titulo"
                    name="titulo"
                    type="text"
                    placeholder="Titulo de la publicación"
                    class="border p-3 w-full rounded-lg @error ('titulo') border-red-500 @enderror"
                    value="{{old('titulo')}}"
                >
                @error('titulo')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>    
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                    Descripción
                </label>
                <textarea  id="descripcion" name="descripcion" placeholder="Descripción de la publicación" class="border p-3 w-full rounded-lg @error ('descripcion') border-red-500 @enderror" value="{{old('descripcion')}}"></textarea>
                @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>    
                @enderror  
            </div>
            <!--Agregar campo oculto para guardar el valor de la imagen-->
            <div class="mb-5">
                    <input type="hidden" name="imagen"  value="{{old('imagen')}}">
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
                    @enderror
                </div>
            <input type="submit" value="Publicar" class="bg-green-700 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" >
        </form>
    </div>
</div>

  
@endsection
