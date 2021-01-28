@extends('layouts.app')

@section('content')
<h1>Eco-Escolas - Noticias</h1>

<div class="listaTipos">
    @if(!isset($actTipo))
    <b>
        @endif
        <a href=" {{ route ('noticia.index') }} ">Todas as Noticias</a>
        @if(!isset($actTipo))
    </b>
    @endif
    @foreach($noticias as $tipo)
        @if(isset($actTipo) && $actTipo == $tipo->id)
    <b>
        @endif
        - <a href="{{ route('noticia.by.tipo', $tipo->id) }}">{{ $tipo->nome }}</a>
        @if(isset($actTipo) && $actTipo == $tipo->id)
    </b>
    @endif
    @endforeach
</div>

@foreach ($noticias as $noticia)
<div class="noticia">
    <a href="{{ route ('noticia.show',$noticia->id) }}">
        <img src="{{ $noticia['img'] }}" alt="">
        <h2>{{ $noticia->nome }}</h2>
    </a>
</div>
@endforeach
@endsection