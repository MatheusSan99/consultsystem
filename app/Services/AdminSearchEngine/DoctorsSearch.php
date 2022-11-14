<?php

namespace App\Services\AdminSearchEngine;


use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorsSearch implements SearchEngine
{
    public function search(Request $request)
    {
        $doctors = Doctor::query();

        $doctors->when($request->search, function ($query, $campoDePesquisa){
            $query->where('name', 'like', '%' . $campoDePesquisa . '%');
        });

        return $doctors->paginate(5);
    }

}
