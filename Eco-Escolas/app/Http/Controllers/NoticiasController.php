<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{

    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias', ['noticias' => $noticias]);
    }

    public function show($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('detalhes', ['noticia' => $noticia]);
    }

    public function create()
    {
        return view('createNoticia');
    }

    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=> 'required'
        ]);

        
        $name =  request('name');
        $desc = request('desc');

        $noticia =  new Noticia();

        $noticia->nome = $name;
        $noticia->desc = $desc;

        $noticia->save();

        return redirect('/noticias/create')->with('mssg', 'Noticia Criada');
    }

    public function destroy($id){
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();
        return redirect('/noticias');
    }

}
