@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Lista de Pacientes</h1>

    <a href="{{url('pacientes/create')}}" class="btn btn-primary">Adicionar</a>
  @endsection()

  @section('conteudo')
    @if ($message=Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-striped mt-5">
      <tr>
        <td>Nome</td>
        <td>CPF</td>
        <td>E-mail</td>
        <td>Telefone</td>
        <td>Endereço</td>
        <td>Idade</td>
        <td>#</td>
        <td>#</td>
      </tr>

      @foreach ($pacientes as $paciente)
        <tr>
          <td>{{ $paciente->nome }}</td>
          <td>{{ $paciente->cpf }}</td>
          <td>{{ $paciente->email }}</td>
          <td>{{ $paciente->telefone }}</td>
          <td>{{ $paciente->endereco }}</td>
          <td>{{ $paciente->idade }}</td>
          <td>
            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Excluir</button>
            </form>
          </td>
          <td>
            <a href="{{url('pacientes/'.$paciente->id.'/edit')}}">
              <button class="btn btn-success">Editar</button>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  @endsection
