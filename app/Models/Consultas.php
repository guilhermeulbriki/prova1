<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
  use HasFactory;

  protected $table='consultas';
  protected $fillable=['medicos_id', 'pacientes_id', 'data', 'hora', 'data', 'valor', 'convenio'];

  public function medicos() {
    return $this->belongsTo(Medicos::class);
  }

  public function pacientes() {
    return $this->belongsTo(Pacientes::class);
  }
}
