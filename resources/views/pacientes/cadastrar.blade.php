@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Adicionar novo Paciente</h1>
  @endsection()

  @section('conteudo')
    <form action="{{ route('pacientes.store') }}" method="POST">
      @csrf

      <div class="form-group mt-4">
        <label>Nome:</label>
        <input value="{{ old('nome') }}" class="form-control" type="text" name="nome" placeholder="Nome">
      </div>

      <div class="form-group mt-3">
        <label>CPF:</label>
        <input value="{{ old('cpf') }}" class="form-control" type="text" name="cpf" placeholder="000-000-000-00">
      </div>

      <div class="form-group mt-3">
        <label>E-mail:</label>
        <input value="{{ old('e-mail') }}" class="form-control" type="email" name="email" placeholder="email@email.com">
      </div>

      <div class="form-group mt-3">
        <label>Telefone:</label>
        <input value="{{ old('telefone') }}" class="form-control" type="text" name="telefone" placeholder="(55) 99999-9999">
      </div>

      <div class="form-group mt-3">
        <label>Endereço:</label>
        <input value="{{ old('endereco') }}" class="form-control" type="text" name="endereco" placeholder="Endereço">
      </div>

      <div class="form-group mt-3">
        <label>Idade:</label>
        <input value="{{ old('idade') }}" class="form-control" type="number" name="idade" placeholder="Idade">
      </div>

      <button class="btn btn-primary mt-3" type="submit">Cadastrar</button>
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
