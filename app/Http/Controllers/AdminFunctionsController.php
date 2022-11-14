<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminFunctionsController extends Controller
{
    public function specialtyList()
    {
        $specialtys = Category::all();
        return view('admin.especialty.specialtyList', compact('specialtys'));
    }
    public function createSpecialty()
    {
        return view('admin.especialty.newSpecialty');
    }

    public function storeSpecialty()
    {

    }

    public function deleteSpecialty()
    {

    }
}
