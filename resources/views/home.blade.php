@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Painel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        <a href="{{ route('tarefa.index') }}">Ver tarefas</a>
                    </p>
                    <p>
                        <a href="{{ route('tarefa.create') }}">Criar tarefas</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
