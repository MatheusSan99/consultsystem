<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacientRequest;
use App\Http\Requests\PhoneNumberRequest;
use App\Models\Pacient;
use App\Models\PhoneNumberList;
use App\Services\AdminSearchEngine\PacientsSearch;
use App\Services\TransationMessage;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminPacientsController extends Controller
{
    public function list(PacientsSearch $pacientsSearch, Request $request)
    {
        $pacients = $pacientsSearch->search($request);
        return view('admin.pacients.pacientsList',compact('pacients'));
    }

    public function createPacient(Request $request)
    {
        $message = $request->session()->get('message');
        $request->session()->remove('message');
        return view('admin.pacients.newPacient', compact('message'));
    }

    /**
     * @throws Exception
     */
    public function storeNewPacient(PacientRequest $pacientRequest, PhoneNumberRequest $phoneNumberRequest, TransationMessage $transationMessage)
    {
        $pacients = Pacient::all();
        $actualDate = new DateTime();
        $newPacient = $pacientRequest->validated();
        $birthDateClient = new DateTime($newPacient['birth_date']);
        $dateCalc = $birthDateClient->diff($actualDate);
        if (!empty($newPacient['responsable_cpf'])) {
            $newPhoneNumber = $phoneNumberRequest->validated();
            $listId = PhoneNumberList::create($newPhoneNumber);
            $newPacient['phone_number_list_id'] = $listId->id;

            Pacient::create($newPacient);

            return view('admin.pacients.pacientsList',compact('pacients'));
        }

        if($dateCalc->days < 6573) {
            $transationMessage->returnIncorrectDate($pacientRequest);
            return Redirect::back()->with(['status' => 'Erro de Idade']);
        }

        $newPhoneNumber = $phoneNumberRequest->validated();
        $listId = PhoneNumberList::create($newPhoneNumber);
        $newPacient['phone_number_list_id'] = $listId->id;

        Pacient::create($newPacient);

        return Redirect::route('adminPacientsList');

    }
    public function editPacient($id)
    {
        $pacient = Pacient::find($id);
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

    public function destroyPacient(int $id, Pacient $pacient)
    {
        $pacient = $pacient->find($id);

        $pacient->delete();

        return Redirect::route('adminPacientsList');
    }
}
