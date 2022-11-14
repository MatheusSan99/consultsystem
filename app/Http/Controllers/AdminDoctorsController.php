<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorStoreRequest;
use App\Models\Category;
use App\Models\Doctor;
use App\Services\AdminSearchEngine\DoctorsSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminDoctorsController extends Controller
{
    public function doctorsList(DoctorsSearch $doctorsSearch, Request $request)
    {
        $specialtys = Category::all();
        $doctors = $doctorsSearch->search($request);
        return view('admin.doctors.doctorsList', compact('doctors','specialtys'));
    }

    public function createDoctor()
    {
        $specialtys = Category::all();

        return view('admin.doctors.newDoctor', compact('specialtys'));
    }

    public function storeNewDoctor(DoctorStoreRequest $doctorStoreRequest)
    {
        $newDoctor = $doctorStoreRequest->validated();
        $newDoctor['function_id'] = $doctorStoreRequest->function_id;
        Doctor::create($newDoctor);

        return Redirect::route('adminDoctorsList');
    }

    public function editDoctor(int $id)
    {
        $doctors = Doctor::find($id);
        $specialtys = Category::all();

        return view('admin.doctors.editDoctor', compact('doctors','specialtys'));
    }

    public function updateDoctor($id, DoctorStoreRequest $doctorStoreRequest)
    {
        $doctors = Doctor::find($id);
        $newDoctor = $doctorStoreRequest->validated();
        $doctors->fill($newDoctor);
        $doctors->saveOrFail();

        return Redirect::route('adminDoctorsList');
    }

    public function destroyDoctor($id, Doctor $doctor)
    {
        $doctor = $doctor->find($id);

        $doctor->delete();

        return Redirect::route('adminDoctorsList');
    }
}
