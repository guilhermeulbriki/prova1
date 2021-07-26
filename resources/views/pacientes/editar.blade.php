@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Editar Paciente</h1>
  @endsection()

  @section('conteudo')
    <form action="{{ route('pacientes.update', $pacientes->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group mt-4">
        <label>Nome:</label>
        <input value="{{$pacientes->nome}}" class="form-control" type="text" name="nome" placeholder="Nome">
      </div>

      <div class="form-group mt-3">
        <label>CPF:</label>
        <input value="{{$pacientes->cpf}}" class="form-control" type="text" name="cpf" placeholder="000-000-000-00">
      </div>

      <div class="form-group mt-3">
        <label>E-mail:</label>
        <input value="{{$pacientes->email}}" class="form-control" type="email" name="email" placeholder="email@email.com">
      </div>

      <div class="form-group mt-3">
        <label>Telefone:</label>
        <input value="{{$pacientes->telefone}}" class="form-control" type="text" name="telefone" placeholder="(55) 99999-9999">
      </div>

      <div class="form-group mt-3">
        <label>Endereço:</label>
        <input value="{{$pacientes->endereco}}" class="form-control" type="text" name="endereco" placeholder="Endereço">
      </div>

      <div class="form-group mt-3">
        <label>Idade:</label>
        <input value="{{$pacientes->idade}}" class="form-control" type="text" name="idade" placeholder="Idade">
      </div>

      <button class="btn btn-primary mt-3" type="submit">Alterar</button>
    </form>

    @if ($errors->any())
      <div class="mt-5 alert alert-danger">
        <p>
          <strong>Atenção!</strong>
          Paciente não cadastrado devido aos seguintes erros:
        </p>

        <ul>
          @foreach ($errors->all() as $erro)
            <li> {{ $erro }} </li>
          @endforeach
        </ul>
      </div>
    @endif
  @endsection
