<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
  use HasFactory;

  protected $table = 'medicos';
  protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'crm', 'especialidade'];

  public function consultas() {
    return $this->hasMany(Consultas::class);
  }
}
