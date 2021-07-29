@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Relatório dos Médicos</h1>
  @endsection()

  @section('conteudo')
    <table class="table table-striped mt-5">
      <tr>
        <td>Nome</td>
        <td>CPF</td>
        <td>E-mail</td>
        <td>Telefone</td>
        <td>CRM</td>
        <td>Especialidade</td>
      </tr>

      @foreach ($medicos as $medico)
        <tr>
          <td>{{ $medico->nome }}</td>
          <td>{{ $medico->cpf }}</td>
          <td>{{ $medico->email }}</td>
          <td>{{ $medico->telefone }}</td>
          <td>{{ $medico->crm }}</td>
          <td>{{ $medico->especialidade }}</td>
        </tr>
      @endforeach
    </table>

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
