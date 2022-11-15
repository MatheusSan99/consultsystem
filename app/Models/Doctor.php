<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name','function_id','crm','pacient_id'];

    public function pacient()
    {
        return $this->hasMany(Pacient::class);
    }
    public function consult()
    {
        return $this->hasMany(Consult::class);
    }

    public function function()
    {
        return $this->hasOne(Category::class);
    }
}
