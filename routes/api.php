<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserManagementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post("/register", [AuthController::class, "register"]);

Route::post("/login", [AuthController::class, "login"]);

Route::get("/test", [UserManagementController::class, "test"]);


// Route::middleware('auth:sanctum')->get('/listusers', function(Request $request){
//     return $request->user();
// });

Route::group([
    "middleware" => ["auth:sanctum"]
], function(){
    Route::post("/logout", [AuthController::class, "logout"]);

    Route::get("listusers", [UserManagementController::class, "listusers"])->middleware("role");
    Route::get("home", [UserManagementController::class, "home"]);
    Route::get("logout", [AuthController::class, "logout"]);
    Route::post("deleteuser", [UserManagementController::class, "deleteUser"]);
    Route::get("getuserbyid/{id}", [UserManagementController::class, "getUserById"]);
    Route::post("updateuser/{id}", [UserManagementController::class, "updateuser"]);
    Route::post("resetpassword/{id}", [UserManagementController::class, "updatePassword"]);
    Route::delete("deleteuser/{id}", [UserManagementController::class, "deleteUser"]);
    
});