@extends('layouts.app')

@section('content')
<h1>Eco-Escolas - Detalhes</h1>
<div class="detalhes">
    @if (isset($noticia))
    <img src="{{ $noticia['img'] }}" alt="">
    <h2>{{ $noticia->nome}}</h2>
    <p>{{$noticia->desc}}</p>
    @else
    <h1>A noticia não existe</h1>
    @endif

    @auth
    @if($noticia->created_by == auth()->user()->id || auth()->user()->IsAdmin)
    
    <form action="{{ route('noticia.destroy', $noticia->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="crinot">Eliminar Noticia</button>
    </form>
    <br>

    <form action="{{ route('noticia.edit', $noticia->id) }}" method="GET">
        @csrf
        <button class="crinot">Editar Noticia</button>
    </form>
    @endif
    @endauth
    <br>
    <a href="/noticias"><button class="crinot">Voltar às noticias</button></a>
</div>
@endsection