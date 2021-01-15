@extends('layouts.layout')

@section('content')
<h1>Eco-Escolas - Detalhes</h1>
<div class="detalhes">
    @if (isset($noticia))
        <img src="{{ $noticia['img'] }}" alt="">
        <h2>{{ $noticia->nome}}</h2>
        <p>{{$noticia->desc}}<br/>€</p>
    @else 
        <h1>A noticia não existe</h1>
    @endif
    <form action="route('noticia.destroy',$noticia->id)"method="POST">
    @csrf
    @method('DELETE')
    <button>Eliminar Produto</button>
    </form>


    <a href="/noticias"> Voltar às noticias</a>
</div>
@endsection