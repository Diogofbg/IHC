@extends('layouts.app')

@section('content')
<h1>Eco-Escolas</h1>
<div class="intro">
<img class="imgprin"src="/img/1.png" alt="">
<br>
<br>
<br>
<br>
<a href="{{ route('noticia.index') }}"><button class="vernot">Ver Noticias</button></a>
</div>
@endsection