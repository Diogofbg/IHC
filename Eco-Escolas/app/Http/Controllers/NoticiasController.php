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
        $tipos = tipo_noticia::all();
        $noticias = Noticia::all();
        return view('noticias', ['noticias' => $noticias, 'tipos' => $tipos]);
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

    public function edit($id)
    {
        $tipos = tipo_noticia::all();
        $noticia = Noticia::findOrFail($id);

        return view('createNoticia', ['noticia' => $noticia, 'tipos' => $tipos]);
    }

    public function update($id, EditNoticiaRequest $request)
    {
        $name = request('name');
        $desc = request('desc');
        $tipo = request('tipoNoticia');

        $changed = request('changed');

        $noticia = Noticia::findOrFail($id);

        if ($changed == 'true') {
            $url = "";
            if ($request->has('url')) {
                $image = $request->file('url');

                $iname = 'prod' . '_' . time();
                $folder = '/img/noticias/';
                $fileName = $iname . '.' . $image->getClientOriginalExtension();
                $filePath = $folder . $fileName;

                $image->storeAs($folder, $fileName, 'public');
                $url = "/storage/".$filePath;
            }

            $noticia->url = $url;
        }
        
        $noticia->nome = $name;
        $noticia->desc = $desc;
        $noticia->tipo_noticia_id = $tipo;

        $noticia->save();

        return redirect("/noticias/$id")->with('mssg', 'Noticia Atualizada');
    }

    public function store(NewNoticiaRequest $request)
    {
        $tipo = request('tipoNoticia');
        $name =  request('name');
        $desc = request('desc');
        $url = request('url');

        $url = "";
        if ($request->has('url')) {
            $image = $request->file('url');

            $iname = 'not' . '_' . time();
            $folder = '/img/noticias/';
            $fileName = $iname . '.' . $image->getClientOriginalExtension();
            $filePath = $folder . $fileName;

            $image->storeAs($folder, $fileName, 'public');
            $url = "/storage/" . $filePath;
        }

        $noticia = new Noticia();

        $noticia->nome = $name;
        $noticia->desc = $desc;
        $noticia->tipo_noticia_id = $tipo;
        $noticia->created_by = auth()->user()->id;
        $noticia->url = $url;

        $noticia->save();

        return redirect('/noticias/create')->with('mssg', 'Noticia Criada');
        
    }
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();
        return redirect('/noticias');
    }

    public function noticiasPorTipo($id)
    {
        $tipos = tipo_noticia::all();
        $tipo = tipo_noticia::findOrFail($id);
        $noticias = $tipo->noticias;

        return view('noticias', ['noticias' => $noticias, 'tipos' => $tipos, 'actTipo' => $id]);
    }
}
