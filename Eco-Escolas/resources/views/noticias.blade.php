@extends('layouts.app')

@section('content')
<h1>Eco-Escolas - Noticias</h1>

<div class="listaTipos">
    @if(!isset($actTipo))
    <b>
        @endif
       <a href=" {{ route ('noticia.index') }} "> <button class="todnot">Todas as Noticias</button></a>
        @if(!isset($actTipo))
    </b>
    @endif
    @foreach($tipos as $tipo)
        @if(isset($actTipo) && $actTipo == $tipo->id)
    <b>
        @endif
        - <a href="{{ route('noticia.by.tipo', $tipo->id) }}"><button class="todnot">{{ $tipo->nome }}</button></a>
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