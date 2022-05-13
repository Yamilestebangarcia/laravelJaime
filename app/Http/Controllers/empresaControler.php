<?php

namespace App\Http\Controllers;

use App\Http\Requests\dataEmpresaRequest;
use App\Http\Requests\updateEmpresaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\empresa;
use Illuminate\Support\Facades\DB;

class empresaControler extends Controller
{
    public function mainEmpresa()
    {
        if (!auth()->user()->email_verified) {
            return redirect()->route("dataRegister")->with("info", "Completa el registro y espera a que lo validen");
        }
        // return view("empresa.main")
        return "main empresa";
    }
    public function dataRegister()
    {
        $idUser = Auth::id();
        $user = DB::table("empresas")->where("idUserFK", "=", $idUser)->get();

        // return $user;
        return view("empresa.formRegistro", compact("user"));
    }

    public function dataRegisterPost(dataEmpresaRequest $request)
    {
        //crear un campo en la tabla empresa par guardar el id de la tabla de user y
        //asi poder relacionarla
        $idUser = Auth::id();
        $user = DB::table("users")->where("id", "=", $idUser)->get();

        DB::table("empresas")->insert([
            "idUserFK" => $idUser,
            "cif" => $request->cif,
            "email" => $user[0]->email,
            "nombreComercial" => $request->nombre,
            "autorizado" => 0,
            "tipo" => $request->tipo,
            "web" => $request->web,
            "telefono" => $request->telefono,
            "actividad" => $request->actividad,
            "horario" => $request->horario,
            "observaciones" => $request->observaciones
        ]);



        return redirect()->route("dataRegister")->with("info", "Datos guardados");
    }
    public function UpdateDatosRegistro(updateEmpresaRequest $request)
    {
        $idUser = Auth::id();
        $empresa = DB::table("empresas")->where("idUserFK", "=", $idUser)->update([
            "tipo" => $request->tipo,
            "web" => $request->web,
            "telefono" => $request->telefono,
            "actividad" => $request->actividad,
            "horario" => $request->horario,
            "observaciones" => $request->observaciones,
            "nombreComercial" => $request->nombre
        ]);


        return redirect()->route("dataRegister")->with("info", "Datos guardados");
    }
}
