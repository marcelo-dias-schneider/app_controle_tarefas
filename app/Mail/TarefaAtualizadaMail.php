<?php
// php artisan make:mail TarefaAtualizadaMail --markdown emails.tarefa-atualizada
namespace App\Mail;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class TarefaAtualizadaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tarefa_antiga;
    public $data_conclusao_antiga;
    public $tarefa;
    public $data_conclusao;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa, $tarefa_antiga)
    {
        $this->tarefa_antiga = $tarefa_antiga['tarefa'];
        $this->data_conclusao_antiga = date('d/m/Y', strtotime($tarefa_antiga['data_conclusao']));
        $this->tarefa = $tarefa->tarefa;
        $this->data_conclusao = date('d/m/Y', strtotime($tarefa->data_conclusao));
        $this->url = URL::to('/') . '/tarefa/' . $tarefa->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tarefa-atualizada')
            ->subject('Tarefa atualizada');
    }
}
