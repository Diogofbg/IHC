@extends('layouts.app')

@section('content')
<h1>Eco-Escolas - 
    @if (isset($noticia))
    Editar Noticia
    @else
    Criar Noticia
    @endif
</h1>
<div class="detalhes">
    <p class="message">{{session('mssg') }}</p>
    
    @if ($errors->any()) 
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" enctype="multipart/form-data"
        @if(isset($noticia))
            action="{{ route('noticia.update', $noticia->id) }}"
        @else
            action="{{ route('noticia.store') }}"
        @endif>
        @csrf
        @if (isset($noticia))
            @method('PUT')
        @endif
        <label for="titulo">Titulo da Notícia: </label>
        <input type="text" id="name" name="name"
        @if(isset($noticia))
            value="{{ $noticia->nome }}"
        @endif
        >
        <br>
        <label for="desc">Descrição da Noticia:</label>
        <input type="text" id="desc" name="desc"
        @if(isset($noticia))
            value="{{ $noticia->desc }}"
        @endif>
        <br>

        <input type="hidden" id="changed" name="changed" value="false">
        <label for="url">Imagem:</label>
        <input type="file" id='url' name='url'
            onchange="document.getElementById('changed').value='true';">
            @if(isset($noticia))
            (não alterar para manter foto)
            @endif
        <br>

        <label for="tipoNoticia">Tipo de Noticia:</label>
        <select name="tipoNoticia" id="tipoNoticia">
            @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}"
            @if (isset($noticia) && $noticia->tipo_noticia_id == $tipo->id)
            selected="selected"
            @endif> {{ $tipo->nome }} </option>
            @endforeach
        </select>

    <br>
    <br>
    <input type="submit" class="crinot"
        @if(isset($noticia))
            value="Editar Noticia"
        @else
        value="Criar Noticia"
        @endif>
    </form>
        <br>
        <br>
        <a href="/noticias"><button class="botvol">Voltar as Notícias</button></a>
</div>
@endsection