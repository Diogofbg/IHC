<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditNoticiaRequest;
use App\Noticia;
use Illuminate\Http\Request;
use App\Models\tipo_noticia;
use App\Http\Requests\NewNoticiaRequest;


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
        $tipos = tipo_noticia::all();

        return view('createNoticia', ['tipos' => $tipos]);
    }

    public function edit($id){
        $tipos = tipo_noticia::all();
        $noticia = Noticia::findOrFail($id);

        return view('createNoticia', ['noticia' => $noticia, 'tipos' => $tipos]);
    }

    public function update($id, EditNoticiaRequest $request)
    {
        $name = request('name');
        $desc = request('desc');
        $tipo = request('tipoProduto');

        $noticia = Noticia::findOrFail($id);

        $noticia->nome = $name;
        $noticia->desc = $desc;
        $noticia->tipo_noticia_id = $tipo;

        $noticia->save();

        return redirect('/noticia/$id')->width('mssg', 'Noticia Criada');
    }

    public function store(NewNoticiaRequest $request)
    {
        $validateData=$request->validate([
            'name'=> 'required'           
        ]);

        $tipo = request('tipoNoticia');
        $name =  request('name');
        $desc = request('desc');

        $noticia =  new Noticia();

        $noticia->nome = $name;
        $noticia->desc = $desc;
        $noticia->tipo_noticia_id = $tipo;
        $noticia->created_by = auth()->user()->id;

        $noticia->save();

        return redirect('/noticias/create')->with('mssg', 'Noticia Criada');
    }

    public function destroy($id){
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();
        return redirect('/noticias');
    }

    public function noticiasPorTipo($id){
        $tipos = tipo_noticia::all();
        $tipo = tipo_noticia::findOrFail($id);
        $produtos = $tipo->noticias;

        return view('noticias',['noticias' => $produtos, 'tipos' => $tipos, 'actTipo' => $id]);
    }

}
