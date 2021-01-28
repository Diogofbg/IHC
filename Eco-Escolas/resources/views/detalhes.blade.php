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
        <button>Eliminar Noticia</button>
    </form>
    <form action="{{ route('noticia.edit', $noticia->id) }}" method="GET">
        @csrf
        <button>Editar Noticia</button>
    </form>
    @endif
    @endauth
    <a href="/noticias"> Voltar às noticias</a>
</div>
@endsection