<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\AdminSearchEngine\CategorySearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminFunctionsController extends Controller
{
    public function specialtyList(CategorySearch $categorySearch, Request $request)
    {
        $specialtys = $categorySearch->search($request);
        return view('admin.specialty.specialtyList', compact('specialtys'));
    }

    public function createSpecialty()
    {
        return view('admin.specialty.newSpecialty');
    }

    public function storeNewSpecialty(CategoryRequest $request)
    {
        $newSpecialty = $request->validated();
        Category::create($newSpecialty);

        return view('admin.dashboard');
    }

    public function editSpecialty(int $id)
    {
        $specialtys = Category::find($id);
        return view('admin.specialty.editSpecialty', compact('specialtys'));
    }

    public function updateSpecialty(int $id, CategoryRequest $categoryRequest)
    {
        $category = Category::find($id);
        $newSpecialty = $categoryRequest->validated();

        $category->fill($newSpecialty);
        $category->saveOrFail();

        return Redirect::route('specialtylist');
    }

    public function deleteSpecialty(Category $category, int $id)
    {
        $category = $category->find($id);
        $category->delete();

        return Redirect::route('specialtylist');
    }
}
