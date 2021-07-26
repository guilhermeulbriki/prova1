<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
  use HasFactory;

  protected $table = 'pacientes';
  protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco', 'idade'];

  public function consultas() {
    return $this->hasMany(Consultas::class);
  }
}
