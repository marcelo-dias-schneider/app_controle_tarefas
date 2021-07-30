@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seja muito bem vindo!</div>

                <div class="card-body">
                    @auth
                    <h1>Você esta logado {{ Auth::user()->name }}</h1>
                    <p>{{ Auth::user()->id }} - {{ Auth::user()->email }}</p>
                    @endauth
                    @guest
                    <h1>Você não esta logado</h1>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
