@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar tarefa</div>

                <div class="card-body">
                    <form method="post" action="{{ route('tarefa.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="tarefa" class="form-label">Tarefa</label>
                            <input type="text" name="tarefa" id="tarefa" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="data_conclusao" class="form-label">Data de conclusão</label>
                            <input type="date" name="data_conclusao" class="form-control" id="data_conclusao">
                        </div>
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
