<?php

namespace App\Services\AdminSearchEngine;

use App\Models\Pacient;
use Illuminate\Http\Request;

class PacientsSearch implements SearchEngine
{

    public function search(Request $request)
    {
        $pacients = Pacient::query();

        $pacients->when($request->search, function ($query, $campoDePesquisa){
            $query->where('name', 'like', '%' . $campoDePesquisa . '%')->orWhere('cpf', 'like', '%' . $campoDePesquisa . '%');
        });

        return $pacients->paginate(5);
    }
}
