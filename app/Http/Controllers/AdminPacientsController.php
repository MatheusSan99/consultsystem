<?php

namespace App\Http\Controllers;

use App\Services\AdminSearchEngine\PacientsSearch;
use Illuminate\Http\Request;

class AdminPacientsController extends Controller
{
    public function list(PacientsSearch $pacientsSearch, Request $request)
    {
        $pacients = $pacientsSearch->search($request);
        return view('admin.pacients.pacientsList',compact('pacients'));
    }
}
