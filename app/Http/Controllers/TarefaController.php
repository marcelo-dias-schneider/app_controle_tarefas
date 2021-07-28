<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // verifica se a sessão é ativa dentro de um metodo especifico
        if(auth()->check()){
            // recupera os dados do usuario atravez da sessao
            $usuario['id'] = auth()->user()->id;
            $usuario['nome'] = auth()->user()->name;
            $usuario['email'] = auth()->user()->email;
            // exibindo os dados
        } else {
            return 'Você não esta logado';
        }
        $tarefas = Tarefa::where('user_id', $usuario['id'])->paginate(1);
        return view('tarefa.index', compact('usuario', 'tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // recuperando os dados individualmente
        // $tarefa = Tarefa::create([
        //     'user_id' => $user_id,
        //     'tarefa' => $request->get('tarefa'),
        //     'data_conclusao' => $request->get('data_conclusao')
        // ]);
        // criando um array com os dados
        $dados = $request->all('tarefa', 'data_conclusao');;
        $dados['user_id'] = auth()->user()->id;
        $tarefa = Tarefa::Create($dados);
        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show', compact('tarefa') );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
