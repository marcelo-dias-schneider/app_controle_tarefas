<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
        .page-break {
            page-break-after: always;
        }

        .titulo {
            border: 1px;
            background-color: #c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .tabela {
            width: 100%;
        }

        table th {
            text-align:left;
        }
    </style>
    <body>
        <h1 class="titulo"> Lista de tarefas </h1>
        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tarefa</th>
                    <th>Data limite conclusão</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                    <tr>
                        <td>{{ $tarefa->id }}</td>
                        <td>{{ $tarefa->tarefa }}</td>
                        <td>{{ date('d/m/Y', strtotime($tarefa->data_conclusao) ) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h1>Está é a segunda pagina</h1>
    </body>
</html>
