@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Login Efetuado com sucesso !') }}
                    <br>
                    <br>
                    @if(auth()->user()->IsAdmin)
                    <a class="criar" href="{{ route('noticia.index') }}"><button class="crinot">Gerir Noticias</button></a>
                    @else
                    <a class="criar" href="{{ route('noticia.create') }}"><button class="crinot">Criar Noticia</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
