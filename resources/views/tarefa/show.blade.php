@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $tarefa->tarefa }}</div>

                <div class="card-body">
                    <p>Você deve {{ $tarefa->tarefa }} até {{ date('d/m/Y', strtotime($tarefa->data_conclusao)) }}</p>
                    <p>
                        {{-- <a href="{{ route('tarefa.index') }}">Ver tarefas</a> --}}
                        <a href="{{ url()->previous() }}">Voltar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
