<?php

namespace App\Services\AdminSearchEngine;
use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableSearch implements SearchEngine
{

    public function search(Request $request)
    {
        $responsable = Responsable::query();

        $responsable->when($request->search, function ($query, $campoDePesquisa){
            $query->where('name', 'like', '%' . $campoDePesquisa . '%');
        });

        return $responsable->paginate(5);
    }
}
