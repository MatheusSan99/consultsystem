<?php

namespace App\Http\Controllers;

use App\Models\Pacient;
use App\Services\AdminSearchEngine\PacientsSearch;
use Illuminate\Http\Request;

class AdminPacientsController extends Controller
{
    public function list(PacientsSearch $pacientsSearch, Request $request)
    {
        $pacients = $pacientsSearch->search($request);
        return view('admin.pacients.pacientsList',compact('pacients'));
    }

    public function editPacient($id)
    {
        $pacient = Pacient::all();
        $pacient = $pacient->find($id);
        return view('admin.pacients.editPacient', ['pacient' => $pacient]);
    }

    public function updatePacient(Pacient $pacient, Request $request)
    {
        $newPacient = $request->validated();

        $pacient->fill($newPacient);
        $pacient->saveOrFail();
    }
}
