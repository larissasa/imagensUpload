@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>{{ __('Usuários') }}</h4>
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

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>{{ __('Nome') }}</td>
                            <td>{{ __('E-mail') }}</td>
                            <td>{{ __('Perfil') }}</td>
                            <td>{{ __('Ações') }}</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->profile }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="badge badge-warning">{{ __('Editar') }}</a>
                            <a href="{{ route('users.delete', $user->id) }}" class="badge badge-danger">{{ __('Deletar') }}</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection