@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h1>Contatos</h1>
                    <hr>
                    <hr>
                    <button class="btn btn-success">Botão</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
