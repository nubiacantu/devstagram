<?php

namespace App\Http\Controllers;
use App\Models\comentarios;
use App\Models\User;
use App\Models\posts;

use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function store(Request $request, User $user, posts $post){
        //validacion de comentario requerido
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);
        //para almacenar datos del comentario
        comentarios::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario,
        ]);

        

        // Imprimir un mensaje de comentario guardado
        return back()->with('mensaje', 'Comentario publicado correctamente');
    }
}
