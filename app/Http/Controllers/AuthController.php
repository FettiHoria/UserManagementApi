<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            "name" => "required|unique:users",
            "email" => "required|email",
            "password" => "required"
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return response()->json([
            "status" => true,
            "message" => "Registration succesfull"
        ]);
    }

    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if(!empty($user)){

            if(Hash::check($request->password, $user->password) && $user->active_status == true){
                
                $token = $user->createToken("AuthToken")->plainTextToken;

                return response()->json([
                    "status" => "true",
                    "message" => "Login successful",
                    "role" => $user->role,
                    "token" => $token
                ]);
            }
        }

        return response()->json([
            "status" => "false",
            "message" => "Invalid credentials",
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => "true",
            "message" => "Tokens deleted",
        ]);
    }
}
