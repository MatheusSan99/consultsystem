<?php

namespace App\Services;
use Illuminate\Http\Request;

class TransationMessage
{
    public function returnIncorrectDate(Request $request)
    {
        $request->session()
            ->flash(
                'message',
                "O Paciente não tem 18 anos completos, é necessário cadastrar um responsável para continuar"
            );
    }

    public function returnInsuficientAge(Request $request)
    {
        $request->session()->flash(
                'message',
                "O Paciente não tem 12 anos completos, é necessário marcar a consulta com um pediatra"
            );
    }
}
