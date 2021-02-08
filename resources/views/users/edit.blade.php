@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ __('Editar Usuário') }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('users.update') }}">
                            @csrf

                            @method('PUT')
                            @include('users.form', ['user' => $user])
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="mt-3">
                                <a href="{{ route('users') }}" class="btn btn-danger">
                                    {{ __('Voltar') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection