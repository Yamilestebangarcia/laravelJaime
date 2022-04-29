<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class empresa extends Controller
{
    public function mainEmpresa()
    {
        if (!auth()->user()->email_verified) {
            return redirect()->route("dataRegister")->with("info", "Debes de completar el registro");
        }
        // return view("empresa.main")
        return "main empresa";
    }
    public function otra()
    {
        return "m";
    }
}
