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

<br>
<br>
<br>

<div class="container">
    <div class="row" style=" margin: 0 0 20px 230px;">
        @foreach ($noticias as $noticia)
        <div class="col-md-4" style="border-bottom: 1px solid black; margin: 0 0 20px 20px; height: 100px; width: 200px;">
            <div class="noticia">
                <a href="{{ route ('noticia.show',$noticia->id) }}">
                    <h2 class="titnot">{{ $noticia->nome }}</h2>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection