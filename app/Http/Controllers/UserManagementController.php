<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{

    public function home(){

        $data = auth()->user();

        return response()->json([
            "status" => "true",
            "message" => "merge home",
            "user" => $data
        ]);
    }

    public function ListUsers(){

        $user = User::where("role", null)->get();
        
        return response()->json([
            "status" => "true",
            "message" => $user,
        ]);
    }

    public function getUserById($id){

        $user = User::where("id", $id)->get();

        return response()->json([
            "status" => "true",
            "message" => $user,
        ]);
    }

    public function updateUser(Request $request, $id){
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "active_status" => "required"
        ]);

        User::where("id", $id)->update($request->all());
    }

    public function updatePassword(Request $request, $id){
        $request->validate([
            "password" => "required",
        ]);
        User::where("id", $id)->update(['password' => Hash::make($request->password)]);
    }


    public function deleteUser($id){
        User::where("id", $id)->delete();
    }


    public function test(){

        return response()->json([
            "status" => "true",
            "message" => "tesssssssssssssst",
        ]);
    }
}
