@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Relatório dos Pacientes</h1>
  @endsection()

  @section('conteudo')
    <form action="{{ url('relatorios/pacientes') }}">
      <label class="form-group mt-4">Escolha o Paciente</label>
      <select name="id" class="form-select mt-2">
        <option value="{{ null }}" selected>Selecione um paciente</option>
        @foreach ($pacientes as $paciente)
          <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
        @endforeach
      </select>

      <button class="btn btn-primary mt-4" type="submit">Pesquisar</button>
    </form>

    @if($consultas != null)
      <h2 class="h2 mt-4">Consultas para esse paciente</h2>

      <table class="table table-striped mt-3">
        <tr>
          <th>Médico</th>
          <th>Data</th>
          <th>Hora</th>
          <th>Convenio</th>
          <th>Valor</th>
        </tr>

        @foreach ($consultas as $consulta)
          <tr>
            <td>{{ $consulta->medicos->nome }}</td>
            <td>{{ $consulta->data }}</td>
            <td>{{ $consulta->hora }}</td>
            <td>{{ $consulta->convenio }}</td>
            <td>{{ $consulta->valor }}</td>
          </tr>
        @endforeach
      </table>
    @endif
  @endsection
