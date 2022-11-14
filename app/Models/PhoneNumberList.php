<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumberList extends Model
{
    use HasFactory;
    protected $fillable = ['phone_number_first','phone_number_second','phone_number_third','phone_number_fourth'];
    protected $table = 'phone_number_list';

    public function pacient()
    {
        return $this->hasOne(Pacient::class);
    }
}
