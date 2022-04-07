<?php
// php artisan make:mail NovaTarefaMail --markdown emails.nova-tarefa
namespace App\Mail;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tarefa;
    public $data_conclusao;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa->tarefa;
        $this->data_conclusao = date('d/m/Y', strtotime($tarefa->data_conclusao));
        $this->url = URL::to('/') . 'tarefa/' . $tarefa->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.nova-tarefa')
            ->subject('Nova tarefa criada');
    }
}
