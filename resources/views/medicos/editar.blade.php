@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Editar Médicos</h1>
  @endsection()

  @section('conteudo')
    <form action="{{ route('medicos.update', $medicos->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group mt-4">
        <label>Nome:</label>
        <input value="{{$medicos->nome}}" class="form-control" type="text" name="nome" placeholder="Nome">
      </div>

      <div class="form-group mt-3">
        <label>CPF:</label>
        <input value="{{$medicos->cpf}}" class="form-control" type="text" name="cpf" placeholder="000-000-000-00">
      </div>

      <div class="form-group mt-3">
        <label>E-mail:</label>
        <input value="{{$medicos->email}}" class="form-control" type="email" name="email" placeholder="email@email.com">
      </div>

      <div class="form-group mt-3">
        <label>Telefone:</label>
        <input value="{{$medicos->telefone}}" class="form-control" type="text" name="telefone" placeholder="(55) 99999-9999">
      </div>

      <div class="form-group mt-3">
        <label>CRM:</label>
        <input value="{{$medicos->crm}}" class="form-control" type="text" name="crm" placeholder="CRM (Número de Identificação">
      </div>

      <div class="form-group mt-3">
        <label>Especialidade:</label>
        <input value="{{$medicos->especialidade}}" class="form-control" type="text" name="especialidade" placeholder="Especialidade">
      </div>

      <button class="btn btn-primary mt-3" type="submit">Alterar</button>
    </form>

    @if ($errors->any())
      <div class="mt-5 alert alert-danger">
        <p>
          <strong>Atenção!</strong>
          Médico não cadastrado devido aos seguintes erros:
        </p>

        <ul>
          @foreach ($errors->all() as $erro)
            <li> {{ $erro }} </li>
          @endforeach
        </ul>
      </div>
    @endif
  @endsection
