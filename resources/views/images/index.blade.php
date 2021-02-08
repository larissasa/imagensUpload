@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Últimas Imagens Postadas</h4>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <div class="card-deck">
        @foreach ($imagens as $image)
        <div class="card mb-4">
            <img class="card-img-top img-fluid" src="{{  asset('storage/' . $image->image) }}" alt="{{ $image->name }}">
            <div class="card-body">
                <h4 class="card-title">{{ $image->name }}</h4>
                <p class="card-text">{{ $image->description }}</p>
                <p class="card-text"><small>{{ __('Cadastrado por: ') . $image->user->name }}</small></p>
                <p class="card-text">
                    @if(Auth::check() && $image->user && $image->user == Auth::user() || (Auth::check() && Auth::user()->profile == 'admin'))
                        <a href="{{ route('imagens.edit', $image->id) }}" class="badge badge-warning">Editar</a>
                        <a href="{{ route('imagens.delete', $image->id) }}" class="badge badge-danger">Excluir</a>
                    @endif
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
