@component('mail::message')
# Tarefa atualizada

Você deveria {{ $tarefa_antiga }} até {{ $data_conclusao_antiga }}<br>
Agora você deve {{ $tarefa }} até {{ $data_conclusao }}

@component('mail::button', ['url' => $url])
Ver tarafa
@endcomponent

Ate breve,<br>
{{ config('app.name') }}
@endcomponent
