<?php

use App\Mail\MensagemMail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

// A Rora apos login pode ser definida em App\Providers const HOME
Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');
Route::get('tarefa/exportacao', [TarefaController::class, 'export'])->name('tarefa.export');
Route::resource('tarefa', 'App\Http\Controllers\TarefaController')
    ->middleware('verified');

Route::get('/mensagem', function () {
    return new MensagemMail();
    // Mail::to('marcelo.d.schneider@gmail.com')->send(new MensagemMail());
    // return 'Email enviado com sucesso';
});
