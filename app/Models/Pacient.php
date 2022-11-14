<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $fillable = ['name','birth_date','cpf','phone_number_list_id','email','cep','adress','adress_number','responsable_id'];

    public function getPhoneNumberListId()
    {
        return $this->attributes['phone_number_list_id'];
    }

    public function setPhoneNumberListId($id)
    {
            $this->attributes['phone_number_list_id'] = $id;
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function phoneNumberList()
    {
        return $this->hasOne(PhoneNumberList::class);
    }
    public function responsable()
    {
        return $this->hasOne(Responsable::class);
    }
}
