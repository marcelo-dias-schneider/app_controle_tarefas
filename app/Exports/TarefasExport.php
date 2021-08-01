<?php

namespace App\Exports;

use App\Models\Tarefa;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return auth()->user()->tarefas()->get();
    }

    public function headings():array
    {
        return [
            'ID tarefa',
            'ID usuario',
            'Tarefa',
            'Data conclusão',
            'Data criação',
            'Data edição'
        ];
    }
}
