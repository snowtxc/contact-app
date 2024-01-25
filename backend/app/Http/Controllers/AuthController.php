<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//services
use App\Services\AuthService;
class AuthController extends Controller
{

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $token =  $this->authService->login($email,$password);

        if(!isset($token)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        return [
            "name" => $token
        ];
    }

}
