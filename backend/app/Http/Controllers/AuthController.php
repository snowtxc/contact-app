<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;

//services
use App\Services\AuthService;
class AuthController extends Controller
{

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            "password" => "required",

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $body = $request->all();
        $email = $body['email'];
        $password = $body['password'];
        $result =  $this->authService->login($email,$password);

        if(!isset($result)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        return $result;
    }

}
