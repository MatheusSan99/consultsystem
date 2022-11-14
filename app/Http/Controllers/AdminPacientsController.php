<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacientRequest;
use App\Http\Requests\PhoneNumberRequest;
use App\Models\Pacient;
use App\Models\PhoneNumberList;
use App\Services\AdminSearchEngine\PacientsSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminPacientsController extends Controller
{
    public function list(PacientsSearch $pacientsSearch, Request $request)
    {
        $pacients = $pacientsSearch->search($request);
        return view('admin.pacients.pacientsList',compact('pacients'));
    }

    public function createPacient()
    {
        return view('admin.pacients.newPacient');
    }

    public function storeNewPacient(PacientRequest $pacientRequest, PhoneNumberRequest $phoneNumberRequest)
    {
        $pacient = Pacient::all();
        $newPacient = $pacientRequest->validated();
        $newPhoneNumber = $phoneNumberRequest->validated();
        $listId = PhoneNumberList::create($newPhoneNumber);
        $newPacient['phone_number_list_id'] = $listId->id;

        Pacient::create($newPacient);
        dd($newPacient);

        return Redirect::back();
    }
    public function editPacient($id)
    {
        $pacient = Pacient::all();
        $pacient = $pacient->find($id);
        return view('admin.pacients.editPacient', compact('pacient'));

    }

    public function updatePacient(int $id, PacientRequest $pacientRequest)
    {
        $pacient = Pacient::all();
        $pacient = $pacient->find($id);

        $newPacient = $pacientRequest->validated();
        $pacient->fill($newPacient);
        $pacient->saveOrFail();

        return Redirect::route('adminpacientslist');
    }
}
