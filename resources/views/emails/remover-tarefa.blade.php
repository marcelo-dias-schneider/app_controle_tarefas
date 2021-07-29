@component('mail::message')
# Tarefa removida

Você não deve mais {{ $tarefa }} até {{ $data_conclusao }}

@component('mail::button', ['url' => $url])
Ver minhas tarefas
@endcomponent

Ate breve,<br>
{{ config('app.name') }}
@endcomponent
