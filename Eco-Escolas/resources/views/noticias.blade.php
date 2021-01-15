@extends('layouts.layout')

@section('content')
<h1>Eco-Escolas - Noticias</h1>

@foreach ($noticias as $noticia)
<div class="noticia">
    <a href="{{route ('noticia.show',$noticia->id)}}">
        <img src="{{ $noticia['img']}}" alt="">
        <h2>{{ $noticia->nome }}</h2>    
    </a>
</div>
@endforeach
@endsection