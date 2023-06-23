@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
<!-- Main modal -->
<div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-center p-4 border-b bg-teal-700 rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-white dark:text-white">
                    Crear una publicación
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-teal-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!--<form action="" method="post" id="uploadForm">-->
              <!-- Modal body -->
              <!--<div class="flex items-center justify-center p-6">
                  <label for="fileInput" class="flex items-center justify-center w-60 h-60 bg-emerald-100 rounded-full cursor-pointer">
                      <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                  </label>
                  <input type="file" id="fileInput" accept="image/*" class="hidden">
                </div>-->
              <div class=" items-center justify-center p-6">
                <form action="/target" class="dropzone flex justify-center px-6 pt-5 pb-6 border-2 border-teal-500 border-dashed rounded-md" id="my-great-dropzone">
                <div class="items-center justify-center p-6" id="fileUploadContainer">
                  <div class="space-y-1 text-center">

                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-teal-500" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 011.06 0l4.5 4.5a.75.75 0 01-1.06 1.06l-3.22-3.22V16.5a.75.75 0 01-1.5 0V4.81L8.03 8.03a.75.75 0 01-1.06-1.06l4.5-4.5zM3 15.75a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 01.75 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex text-sm text-teal-500">
                      <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium hover:text-teal-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-teal-500">
                        <span>Cargar archivo</span>
                        <input id="my-great-dropzone" name="file-upload" type="file" class="sr-only">

                      </label>
                      <p class="pl-1">o arrastra y suelta el archivo aquí</p>
                    </div>
                    <p class="text-xs text-gray-500">Tamaño máximo: 2MB</p>
                  </div>
                  </div>
                </form>
                <div class="col-span-full">
                  <label for="about" class="block text-lg font-medium leading-6 text-gray-900">Descripción</label>
                  <div class="mt-2">
                    <textarea placeholder="Ingresa una descripción aquí..." id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"></textarea>
                  </div>
                  
                </div>
              </div>
              
              <!-- Modal footer -->
              <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Publicar</button>
                  <button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
              </div>

            <!--</form> -->
        </div>
    </div>
</div>
<!-- imagen y datos de perfil-->
<div class="flex justify-center items-center ">
  <div class="w-full md:w-8/12 lg:w-6/12 flex justify-center">
    <div class="md:w-8/12 lg:w-1/4 px-5">
      <img src="{{asset('img/usuario.svg')}}" alt="Imagen de usuario" class="mx-auto">
    </div>
    <div class="md:w-8/12 lg:w-1/6 px-5 flex flex-col md:items-start py-10">
      <p class="text-gray-700 text-2xl mb-3">{{$user->username}}</p>
      <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
        0
        <span class="font-normal">Seguidores</span>
      </p>
      <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
        0
        <span class="font-normal">Siguiendo</span>
      </p>
      <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
        0
        <span class="font-normal">Post</span>
      </p>
      
    </div>
  </div>
</div>
<br>

<!-- Mostrar los posts de publicación obtenidos desde el PostController método index -->
<section class="container mx-auto mt-10">
  <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
  @if($posts->count())
    <!-- Listamos publicaciones -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ($posts as $post)
        <div>
          <a href="{{route('image.detail',['id' => $post->id])}}">
            <img src="{{ asset('uploads').'/'.$post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
          </a>
        </div>       
      @endforeach
    </div>
    <!-- Agregar enlaces de paginación -->
    <div class="mt-10 justify-end">
        <nav class="flex justify-end">
            {{ $posts->links() }}
        </nav>
    </div>
    
  @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay Publicaciones</p>
  @endif

  
</section>





<!--muestra todos los post del usuario
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> 
    <div class="mx-auto flex max-w-80% flex-col shadow-lg rounded-xl p-16 bg-white">  
            <table class="table-auto ">
                <thead style="background-color: rgba(220, 175, 239, 0.7)">
                    <tr >
                        <th class="px-7 py-3">ID</th>
                        <th class="px-7 py-3">Titulo</th>
                        <th class="px-7 py-3">Descripción</th>
                        <th class="px-7 py-3">Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="border px-7 py-3">{{ $post->id }}</td>
                            <td class="border px-7 py-3">{{ $post->titulo }}</td>
                            <td class="border px-7 py-3">{{ $post->descripcion }}</td>
                            <td class="border px-7 py-3">
                                <div class="flex justify-center">
                                    <div class="w-40">
                                        <img src="{{asset('uploads/'.$post->imagen)}}" alt="Imagen de post" class="mx-auto">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>-->

@endsection
