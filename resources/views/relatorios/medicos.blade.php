@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Relatório dos Médicos</h1>
  @endsection()

  @section('conteudo')
    <form action="{{ url('relatorios/medicos') }}">
      <label class="form-group mt-4">Escolha o Médico</label>
      <select name="id" class="form-select mt-2">
        <option value="{{ null }}" selected>Selecione um médico</option>
        @foreach ($medicos as $medico)
          <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
        @endforeach
      </select>

      <button class="btn btn-primary mt-4" type="submit">Pesquisar</button>
    </form>

    @if($consultas != null)
      <h2 class="h2 mt-4">Consultas para esse médico</h2>

      <table class="table table-striped mt-3">
        <tr>
          <th>Paciente</th>
          <th>Data</th>
          <th>Hora</th>
          <th>Convenio</th>
          <th>Valor</th>
        </tr>

        @foreach ($consultas as $consulta)
          <tr>
            <td>{{ $consulta->pacientes->nome }}</td>
            <td>{{ $consulta->data }}</td>
            <td>{{ $consulta->hora }}</td>
            <td>{{ $consulta->convenio }}</td>
            <td>{{ $consulta->valor }}</td>
          </tr>
        @endforeach
      </table>
    @endif
  @endsection
