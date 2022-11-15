<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id','pacient_id','date'];
    protected $table = 'consult';

    public function doctor()
    {
        $this->hasOne(Doctor::class);
    }
    public function client() {
        $this->hasOne(Pacient::class);
    }
}
