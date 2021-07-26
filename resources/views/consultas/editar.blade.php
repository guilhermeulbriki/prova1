@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Editar Consulta</h1>
  @endsection()

  @section('conteudo')
    <form action="{{ route('consultas.update', $consultas->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group mt-4">
        <label>Medico:</label>
        <select name="medicos_id" class="form-select">
          <option value="{{ null }}" selected>Selecione o médico</option>
          @foreach ($medicos as $medico)
            <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group mt-3">
        <label>Paciente:</label>
        <select name="pacientes_id" class="form-select">
          <option value="{{ null }}" selected>Selecione o paciente</option>
          @foreach ($pacientes as $paciente)
            <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group mt-3">
        <label>Data:</label>
        <input value="{{ $consultas->data }}" class="form-control" type="text" name="data" placeholder="00/00/0000">
      </div>

      <div class="form-group mt-3">
        <label>Hora:</label>
        <input value="{{ $consultas->hora }}" class="form-control" type="text" name="hora" placeholder="00:00">
      </div>

      <div class="form-group mt-3">
        <label>Convenio:</label>
        <select name="convenio" class="form-select">
          <option value="{{ null }}" selected>Selecione o convenio</option>
          <option value="unimed">UNIMED</option>
          <option value="ipe">IPE</option>
          <option value="sus">SUS</option>
          <option value="particular">Particular</option>
          <option value="outro">Outro</option>
        </select>
      </div>

      <div class="form-group mt-3">
        <label>Valor:</label>
        <input value="{{ $consultas->valor }}" class="form-control" type="text" name="valor" placeholder="R$ 0,00">
      </div>

      <button class="btn btn-primary mt-3" type="submit">Cadastrar</button>
    </form>

    @if ($errors->any())
      <div class="mt-5 alert alert-danger">
        <p>
          <strong>Atenção!</strong>
          Consulta não cadastrada devido aos seguintes erros:
        </p>

        <ul>
          @foreach ($errors->all() as $erro)
            <li> {{ $erro }} </li>
          @endforeach
        </ul>
      </div>
    @endif
  @endsection
