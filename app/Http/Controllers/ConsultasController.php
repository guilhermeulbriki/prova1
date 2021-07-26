<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $consultas = Consultas::all();

      return view('consultas/index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $medicos = Medicos::all();
      $pacientes = Pacientes::all();

      return view('consultas/cadastrar', compact('medicos', 'pacientes'));
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
        'medicos_id'=> 'required',
        'pacientes_id'=> 'required',
        'data'=> 'required|min:10|max:10',
        'hora'=> 'required|min:5|max:5',
        'convenio'=> 'required',
        'valor'=> 'required',
      ];

      $msgs = [
        'required'=> 'Campo [:attribute] obrigatório',
        'max'=> 'Campo [:attribute] máximo de [:max]',
        'min'=> 'Campo [:attribute] mínimo de [:min]'
      ];

      $request->validate($regras, $msgs);

      Consultas::create($request->all());

      return redirect('consultas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function show(Consultas $consultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $consultas = Consultas::find($id);
      $pacientes = Pacientes::all();
      $medicos = Medicos::all();

      return view("consultas/editar", compact("pacientes", "medicos", "consultas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $regras = [
        'medicos_id'=> 'required',
        'pacientes_id'=> 'required',
        'data'=> 'required|min:10|max:10',
        'hora'=> 'required|min:5|max:5',
        'convenio'=> 'required',
        'valor'=> 'required',
      ];

      $msgs = [
        'required'=> 'Campo [:attribute] obrigatório',
        'max'=> 'Campo [:attribute] máximo de [:max]',
        'min'=> 'Campo [:attribute] mínimo de [:min]'
      ];

      $request->validate($regras, $msgs);

      $consultas = Consultas::find($id);

      $consultas->update($request->all());

      return redirect("consultas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $consultas = Consultas::find($id);

      $consultas->delete();

      return redirect('consultas');
    }
}
