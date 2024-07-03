<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QvsAController extends Controller
{
    public function index()
    {
        return view('Q&A');
    }
}
