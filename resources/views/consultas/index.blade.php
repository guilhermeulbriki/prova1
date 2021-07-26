@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Lista de Consultas</h1>

    <a href="{{url('consultas/create')}}" class="btn btn-primary">Adicionar</a>
  @endsection()

  @section('conteudo')
    @if ($message=Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-striped mt-5">
      <tr>
        <td>Medico</td>
        <td>Paciente</td>
        <td>Hora</td>
        <td>Data</td>
        <td>Convenio</td>
        <td>Valor (R$)</td>
        <td>#</td>
        <td>#</td>
      </tr>

      @foreach ($consultas as $consulta)
        <tr>
          <td>{{ $consulta->medicos->nome }}</td>
          <td>{{ $consulta->pacientes->nome }}</td>
          <td>{{ $consulta->hora }}</td>
          <td>{{ $consulta->data }}</td>
          <td>{{ $consulta->convenio }}</td>
          <td>{{ $consulta->valor }}</td>
          <td>
            <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Excluir</button>
            </form>
          </td>
          <td>
            <a href="{{url('consultas/'.$consulta->id.'/edit')}}">
              <button class="btn btn-success">Editar</button>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  @endsection
