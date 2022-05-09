<?php

namespace App\Http\Controllers;

use App\Http\Requests\registroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTimeImmutable;
use App\Http\Requests\loginRequest;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;
use Exception;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function registro()
    {
        return view("login.registro");
    }
    public function registroPost(registroRequest $request)
    {
        $request->session()->regenerateToken();
        $user = User::create(["email" => $request->email, "password" => "yamil"]);
        auth()->login($user);;
        return redirect()->route("dataRegister");
    }
    public function login()
    {
        if (Auth::check()) {
            if (Auth()) {
            }
            return redirect()->route("mainEmpresa");
        } else {
            return view("login/login");
        }
    }
    public function loginPost(loginRequest $request)
    {
        $request->session()->regenerateToken();
        $user = DB::table('users')->where("email", "=", $request->email)->get();

        if (isset($user[0]->id)) {
            $fecha = new  DateTimeImmutable();
            $key = env('JWT_SECRET');
            $expire = $fecha->modify(env("JWT_EXPIRE"))->getTimestamp();
            $data  = [
                "id" => $user[0]->id,
                "verified" => $user[0]->email_verified,
                'iat' => $fecha->getTimestamp(),
                'nbf' => $fecha->getTimestamp(),
                "exp" => $expire
            ];

            $jwt = JWT::encode($data, $key, 'HS256');



            Mail::to($user[0]->email)->send(new LoginMail($jwt));


            return redirect()->route("login")->with("info", "Revisa tu email para entrar");
        }
        return redirect()->route("login")->with("info", "Email no existe"); //mandar a registrar en vez de login*/
    }
    public function loginJwt($jwt)
    {
        if (isset($jwt)) {
            $key = env('JWT_SECRET');
            try {
                $data = JWT::decode($jwt, new Key($key, 'HS256'));


                $user = DB::table('users')->find($data->id);

                if (!isset($user->id)) {
                    throw new Exception('Token invalido, intentalo otra vez');
                }

                //el valor del passwor debe de ser una variable de entorno  y fuerte
                if (Auth::attempt(['email' => $user->email, "password" => "yamil"])) {


                    return redirect()->route("mainEmpresa");
                } else {

                    return redirect()->route("login")->with("info", "Token invalido, intentalo otra vez");
                }
            } catch (Exception  $err) {
                print($err);
                return redirect()->route("login")->with("info", "Token invalido, intentalo otra vez");
            }
        }

        return redirect()->route("login")->with("info", "no existe token");
    }
    public function dataRegister()
    {
        return view("empresa.formRegistro");
    }
}
