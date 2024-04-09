<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DotationDepartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('users.comptable.departement');
    }

    public function store(){
        
    }
}
