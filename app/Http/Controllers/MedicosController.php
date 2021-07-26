<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $medicos = Medicos::all();

      return view('medicos/index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('medicos/cadastrar');
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
        'crm'=> 'required',
        'especialidade'=> 'required',
      ];

      $msgs = [
        'required'=> 'Campo [:attribute] obrigatório',
        'max'=> 'Campo [:attribute] máximo de [:max]',
        'min'=> 'Campo [:attribute] mínimo de [:min]'
      ];

      $request->validate($regras, $msgs);

      Medicos::create($request->all());

      return redirect('medicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $medicos = Medicos::find($id);

      return view("medicos/editar", compact("medicos"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $regras = [
        'nome'=> 'required|min:5|max:100',
        'cpf'=> 'required|min:14|max:14',
        'email'=> 'required',
        'telefone'=> 'required|min:15|max:15',
        'crm'=> 'required',
        'especialidade'=> 'required',
      ];

      $msgs = [
        'required'=> 'Campo [:attribute] obrigatório',
        'max'=> 'Campo [:attribute] máximo de [:max]',
        'min'=> 'Campo [:attribute] mínimo de [:min]'
      ];

      $request->validate($regras, $msgs);

      $medicos = Medicos::find($id);

      $medicos->update($request->all());

      return redirect("medicos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $medicos = Medicos::find($id);

      $medicos->delete();

      return redirect('medicos');
    }
}
