@extends('layouts.app')

@section('content')
<h1>Eco-Escolas - Criar Notícia
    @if (isset($noticia))
    Editar Noticia
    @else
    Criar Noticia
    @endif
</h1>
<div class="detalhes">
    <p class="message">{{session('mssg') }}</p>
    <div class="error">
        <ul>
            @foreach($errors->all()as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    <form action="{{ route('noticia.store) }}" method="POST" enctype="multipart/form-data"
        @if(isset($produto))
            action="{{ route('noticia.update', $noticia->id)}}"
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
            value="{{$noticia->nome}}"
        @endif
        >
        <br>
        <label for="desc">Descrição da Noticia:</label
        @if(isset($noticia))
            value="{{$noticia->desc}}"
        @endif>
        <input type="text" id="desc" name="desc">
        <br>
        <label for="tipoNoticia">Tipo de Noticia:</label>
        <select name="tipoNoticia" id="tipoNoticia">
            @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}"
            @if (isset($noticia) && $noticia->tipo_noticia_id == $tipo->id)
            selected="selected"
            @endif
            >{{ $tipo->nome }}</option>
            @endforeach
        </select>
        <br>

        <input type="submit" value="Criar Noticia"
        @if(isset($noticia))
            value="Editar Noticia"
        @else
        value="Criar Noticia"
        @endif>

    </form>
    <a href="/noticias">Voltar as Notícias</a>
</div>
@endsection