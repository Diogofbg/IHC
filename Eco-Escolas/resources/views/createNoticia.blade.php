@extends('layouts.layout')

@section('content')
    <h1>Eco-Escolas - Criar Notícia</h1>
    <div class="detalhes">
        <p class="message">{{session('mssg') }}</p>
        <div class="error">
        <ul>
            @foreach($errors->all()as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    <form action="{{route('noticia.store)}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <label for="titulo">Titulo da Notícia: </label>
    <input type="text" id="name" name="name">
    <br>
    <label for="desc">Descrição da Noticia:</label>
    <input type="text" id="desc" name="desc">
    <br>
    <input type="submit" value="Criar Noticia">

    </form>
    <a href="/noticias">Voltar as Notícias</a>
    </div>
@endsection