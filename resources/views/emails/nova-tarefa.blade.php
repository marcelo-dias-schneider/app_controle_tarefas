@component('mail::message')
# Tarefa criada

Você deve {{ $tarefa }} até {{ $data_conclusao }}

@component('mail::button', ['url' => $url])
Ver tarafa
@endcomponent

Ate breve,<br>
{{ config('app.name') }}
@endcomponent
