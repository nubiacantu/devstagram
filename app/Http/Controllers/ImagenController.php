<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\posts;
use App\Models\comentarios;
use App\Models\User;

class ImagenController extends Controller
{
    public function store(Request $request){
        //identificar el archivo que se sube en dropzone
        $imagen=$request->file('file');

        //convertimos el arreglo input a formato json
        //return response()->json(['imagen'=>$imagen->extension()]);
        //genera un id unico para cada una de las imagenes que se cargan en el server
        $nombreImagen = Str::uuid() . ".". $imagen->extension();

        //implementar intervention Image 
        $imagenServidor=Image::make($imagen);

        //agregamos efectps de intervention image: indicamos la medida de cada imagen
        $imagenServidor->fit(1000,1000);

        //movemos la imagen a un lugar fisico del servidor
        $imagenPath=public_path('uploads'). '/'. $nombreImagen;

        //pasamos la imagen de memoria al server
        $imagenServidor->save($imagenPath);

        ///verificamos que el nombre del archivo se ponga como unico
        return response()->json(['imagen'=>$nombreImagen]);

    }

    public function index($id){
        // Obtener la imagen y los demás datos según el ID
        $post = posts::find($id);
        // Obtener el nombre de usuario del post
        $username = User::where('id', $post->user_id)->value('username');
         // Obtener los comentarios relacionados al post
        $comentarios = comentarios::where('post_id', $post->id)->get(); 

        // Pasar los datos a la vista
        return view('DetallesImagen', ['post' => $post, 'username' => $username, 'comentarios' => $comentarios]);
                    
    }
}
