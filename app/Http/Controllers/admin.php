<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeImmutable;
use App\Http\Requests\CrearEmprRequest;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    public function crearEmpresa()
    {
        Auth:
        return view("admin.crearEmpresa");
    }

    public function crearEmpresaPost(CrearEmprRequest $request)
    {
        //guardar bd la info
        // $request->session()->regenerateToken();
        User::create(["email" => $request->email, "password" => "yamil"]);
        $user = DB::table('users')->where("email", "=", $request->email)->get();

        $email = $request->email;
        $fecha = new  DateTimeImmutable();
        $key = env('JWT_SECRET');
        $expire = $fecha->modify(env("JWT_EXPIRE"))->getTimestamp();
        $data  = [
            "id" => $user[0]->id,
            'iat' => $fecha->getTimestamp(),
            'nbf' => $fecha->getTimestamp(),
            "exp" => $expire
        ];

        $jwt = JWT::encode($data, $key, 'HS256');

        //  Auth::create(['email' => $email, 'password' => $jwt]); //crear




        Mail::to($email)->send(new LoginMail($jwt));


        return redirect()->route("mainAdmin")->with("info", "usuario creado");
    }
    public function mainAdmin()
    {
        return view("admin.main");
    }
}
