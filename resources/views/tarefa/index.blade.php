@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefas de {{ $usuario['nome'] }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tarefa</th>
                            <th scope="col">Data de Conclusão</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $tarefa)
                                <tr>
                                <th scope="row">{{ $tarefa->id }}</th>
                                <td>{{ $tarefa->tarefa }}</td>
                                <td>{{ date('d/m/Y'), strtotime($tarefa->data_conclusao) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- A default pagination with Bootstrap --}}
                    {{-- {{ $tarefas->links() }} --}}
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                            @for ($p = 1; $p <= $tarefas->lastPage(); $p++)
                                <li class="page-item {{ $tarefas->currentPage() == $p ? 'active' : ''}}">
                                    <a class="page-link" href="{{ $tarefas->url($p) }}">{{ $p }}</a>
                                </li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
