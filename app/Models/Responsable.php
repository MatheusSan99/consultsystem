<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    protected $fillable = ['name','cpf'];

    public function pacient()
    {
        return $this->hasOne(Pacient::class);
    }
}
