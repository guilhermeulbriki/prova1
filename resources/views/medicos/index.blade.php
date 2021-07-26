@extends('layouts.principal')
  @section('header')
    <h1 class="h1">Lista de Médicos</h1>

    <a href="{{url('medicos/create')}}" class="btn btn-primary">Adicionar</a>
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
        <td>CRM</td>
        <td>Especialidade</td>
        <td>#</td>
        <td>#</td>
      </tr>

      @foreach ($medicos as $medico)
        <tr>
          <td>{{ $medico->nome }}</td>
          <td>{{ $medico->cpf }}</td>
          <td>{{ $medico->email }}</td>
          <td>{{ $medico->telefone }}</td>
          <td>{{ $medico->crm }}</td>
          <td>{{ $medico->especialidade }}</td>
          <td>
            <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Excluir</button>
            </form>
          </td>
          <td>
            <a href="{{url('medicos/'.$medico->id.'/edit')}}">
              <button class="btn btn-success">Editar</button>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  @endsection
