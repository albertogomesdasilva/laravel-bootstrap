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
                        <h1>Lista</h1>
                        <hr>
                        

                  


{{-- <x-layout title='Listar as Maquinas' rota='Rota Raiz'> --}}
<div class="cor-azul">
<div class="container mt-4">
    <h1>Listar as Máquinas</h1>
    <hr>


    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($machines as $machine)
    <tr>
        <td>{{ $machine->id }}</td>
        <td>{{ $machine->name }}</td>
    </tr>
    @endforeach
  
  </tbody>
</table>
    <hr>
<button type="button" class="btn btn-primary btn-lg btn-block">Novo Registro</button>
</div>
</div>

{{-- </x-layout> --}}







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
