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

        <input type="submit"
        @if(isset($noticia))
            value="Editar Noticia"
        @else
        value="Criar Noticia"
        @endif>

    </form>
    <a href="/noticias">Voltar as Notícias</a>
</div>
@endsection