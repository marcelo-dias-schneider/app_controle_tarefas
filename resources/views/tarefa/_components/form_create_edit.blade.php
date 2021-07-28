@if (isset($tarefa))
    <form method="post" action="{{ route('tarefa.update', compact('tarefa')) }}">
    @method('PUT')
@else
    <form method="post" action="{{ route('tarefa.store') }}">
@endif
    @csrf
    <div class="mb-3">
        <label for="tarefa" class="form-label">Tarefa</label>
        <input type="text" name="tarefa" id="tarefa" class="form-control" value="{{ old('tarefa') ?? ( isset($tarefa->tarefa) ? $tarefa->tarefa : '' ) }}">
        {{ $errors->has('tarefa') ? $errors->first('tarefa') : '' }}
    </div>
    <div class="mb-3">
        <label for="data_conclusao" class="form-label">Data de conclusão</label>
        <input type="date" name="data_conclusao" class="form-control" id="data_conclusao" value="{{ old('data_conclusao') ?? ( isset($tarefa->data_conclusao) ? $tarefa->data_conclusao : '' ) }}">
        {{ $errors->has('data_conclusao') ? $errors->first('data_conclusao') : '' }}
    </div>
    <button type="submit" class="btn btn-primary">Confirmar</button>
</form>
