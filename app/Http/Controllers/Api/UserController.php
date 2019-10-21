<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:150',
            'password' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status' => 500,
                'message' => 'Debes de ingresar usuario y/o clave',
            ], 500);
        }

        $user = User::where('email', '=', $request->input('email'))->first();

        if ($user)
        {
            if (Hash::check($request->input('password'), $user->password))
            {
                return $user;
            }
        }

        return response()->json([
            'status' => 500,
            'message' => 'Usuario/Clave incorrectos!',
        ], 500);

    }
}
