<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pacientes = Pacientes::all();

      return view('pacientes/index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pacientes/cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $regras = [
        'nome'=> 'required|min:5|max:100',
        'cpf'=> 'required|min:14|max:14',
        'email'=> 'required',
        'telefone'=> 'required|min:15|max:15',
        'endereco'=> 'required',
        'idade'=> 'required',
      ];

      $msgs = [
        'required'=> 'Campo [:attribute] obrigatório',
        'max'=> 'Campo [:attribute] máximo de [:max]',
        'min'=> 'Campo [:attribute] mínimo de [:min]'
      ];

      $request->validate($regras, $msgs);

      Pacientes::create($request->all());

      return redirect('pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pacientes = Pacientes::find($id);

      return view("pacientes/editar", compact("pacientes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $regras = [
        'nome'=> 'required|min:5|max:100',
        'cpf'=> 'required|min:14|max:14',
        'email'=> 'required',
        'telefone'=> 'required|min:15|max:15',
        'endereco'=> 'required',
        'idade'=> 'required',
      ];

      $msgs = [
        'required'=> 'Campo [:attribute] obrigatório',
        'max'=> 'Campo [:attribute] máximo de [:max]',
        'min'=> 'Campo [:attribute] mínimo de [:min]'
      ];

      $request->validate($regras, $msgs);

      $pacientes = Pacientes::find($id);

      $pacientes->update($request->all());

      return redirect("pacientes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pacientes = Pacientes::find($id);

      $pacientes->delete();

      return redirect('pacientes');
    }
}
