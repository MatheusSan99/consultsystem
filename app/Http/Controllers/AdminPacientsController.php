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

        return view('admin.pacients.pacientsList');
    }
    public function editPacient($id)
    {
        $pacient = Pacient::all();
        $pacient = $pacient->find($id);
        $phoneNumber = PhoneNumberList::find($pacient->getPhoneNumberListId());

        return view('admin.pacients.editPacient', compact('pacient','phoneNumber'));

    }

    public function updatePacient(int $id, PacientRequest $pacientRequest, PhoneNumberRequest $phoneNumberRequest)
    {
        $pacient = Pacient::all();
        $phone = PhoneNumberList::all();
        $pacient = $pacient->find($id);
        $phone = $phone->find($pacient->phone_number_list_id);

        $newPacient = $pacientRequest->validated();
        $pacient->fill($newPacient);
        $pacient->saveOrFail();
        $newPhoneNumber = $phoneNumberRequest->validated();
        $phone->fill($newPhoneNumber);
        $phone->saveOrFail();
        return Redirect::route('adminpacientslist');
    }

    public function destroyPacient(int $id, Pacient $pacient, PhoneNumberList $phoneNumberList, Request $request)
    {
        $pacient = $pacient->find($id);
        $pacient->delete();

//        $transationMessage->returnDestroyProductMessage($request,$productNome);

        return Redirect::route('adminpacientslist');
    }
}
