<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultRequest;
use App\Models\Consult;
use App\Models\Doctor;
use App\Models\Pacient;
use App\Services\TransationMessage;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ConsultController extends Controller
{
    public function consultList()
    {
        $doctors = Doctor::all();
        $pacients = Pacient::all();
        $consults = Consult::all();

        return view('consult.consultList', compact('consults', 'doctors', 'pacients'));
    }

    public function newConsult(ConsultRequest $request)
    {
        $doctors = Doctor::all();
        $pacients = Pacient::all();
        $message = $request->session()->get('message');
        $request->session()->remove('message');
        return view('consult.newConsult', compact('doctors','message',  'pacients'));
    }

    /**
     * @throws \Exception
     */
    public function storeNewConsult(ConsultRequest $consultRequest, TransationMessage $transationMessage)
    {
        $actualDate = new DateTime();
        $newConsult = $consultRequest->validated();
        $pacient = Pacient::find($newConsult['pacient_id']);
        $doctor = Doctor::find($newConsult['doctor_id']);
        $pacientAge = new DateTime($pacient['birth_date']);
        $dateCalc = $pacientAge->diff($actualDate);

        if ($dateCalc->y > 12) {
            Consult::create($newConsult);

            return Redirect::route('consultList');
        }

        if ($dateCalc-> y < 12 && $doctor->function_id == 7) {
            Consult::create($newConsult);

            return Redirect::route('consultList');
        }

            $transationMessage->returnInsuficientAge($consultRequest);

            return Redirect::back();

    }
}
