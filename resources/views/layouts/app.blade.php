<!doctype html>
<html class="h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite ('resources/css/app.css')
  @vite ('resources/js/app.js')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
  <!--styles-->
  @stack('styles')
  
</head>
<body class="h-full bg-teal-50">
        <!--ENCABEZADO DE LA PAGINA -->
        <header class="p-3 border-b bg-teal-800 text-white shadow ">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    Devstagram
                </h1>
                
                @auth
                    <a href="{{route('post.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-700 rounded text-sm font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        Crear
                    </a>
                    <!--<button data-modal-target="staticModal" data-modal-toggle="staticModal" class="flex items-center gap-2 bg-white border p-2 text-gray-700 rounded text-sm font-bold cursor-pointer" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        Crear
                    </button>-->
                    

                    
                    <!--Navegacion -->
                    <nav class="flex gap-2 item-center ">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                Hola:  <span class="ml-1 font-normal text-white">  {{auth()->user()->username}} </span>

                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <button type="submit" class="bg-teal-900 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-teal-700" >Log Out </button>
                                
                                </form>
                            </div>    
                        </div>
                    </nav>
                @endauth

                @guest
                    <!--Navegacion -->
                    <nav class="flex gap-2 item-center ">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{route('login')}}" class="bg-teal-900 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-teal-700" aria-current="page">Log In</a>
                                <a href="{{route('register')}}" class="text-white hover:bg-teal-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Sign Up</a>
                            </div>
                        </div>
                    </nav>
                @endguest
                
            </div>
        </header>
        <!--Contenido para cada una de las vistas-->

        <main class="bg-teal-50">
        @if(!empty(trim($__env->yieldContent('titulo'))))
            <h2 class="mt-10 font-black text-center text-3xl mb-10">
                        @yield('titulo')
                    </h2>
        @endif
            @yield('contenido')
        </main>

        <!--Pie de pagina -->
        <footer class="text-center p-5 text-gray-500 font-bold uppercase">
            Devstagram UPV - Todos los derechos reservados {{now()->year}}
        </footer>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>  
    </body>
</html>
