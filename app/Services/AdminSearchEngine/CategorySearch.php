<?php

namespace App\Services\AdminSearchEngine;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorySearch implements SearchEngine
{

    public function search(Request $request)
    {
        $categories = Category::query();

        $categories->when($request->search, function ($query, $campoDePesquisa){
            $query->where('name', 'like', '%' . $campoDePesquisa . '%');
        });

        return $categories->paginate(5);
    }
}
