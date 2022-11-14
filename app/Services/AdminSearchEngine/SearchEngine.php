<?php

namespace App\Services\AdminSearchEngine;


use Illuminate\Http\Request;

interface SearchEngine
{
    public function search(Request $request);
}
