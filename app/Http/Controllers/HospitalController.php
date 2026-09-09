<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        return 'Hello from the Hospital Controller';
    }

    public function aboutUs()
    {
        return 'Rameen Attiq';  
    }

    private function privateFunction()
    {
        return 'Hello from Private Function';
    }
}