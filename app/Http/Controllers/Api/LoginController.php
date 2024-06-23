<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login(Request $request){

        // Validamos los campos con el método validateLogin
        $this->validateLogin($request);

        if(Auth::attempt($request->only('email', 'password'))){
            // Retornamos la información del usuario y el token
            return response()->json(
                [
                    'token' => $request->user()->createToken($request->name)->plainTextToken,
                    'message' => 'Login successfull',
                ]
            );
        }

        // Retornamos un mensaje de error
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);


    }

    public function validateLogin(Request $request){
        // Retonamos una validación de los campos
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);

    }
}
