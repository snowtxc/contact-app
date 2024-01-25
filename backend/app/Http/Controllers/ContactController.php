<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;
use Validator;

class ContactController extends Controller
{
    public function __construct(ContactService $contactService){
        $this->contactService = $contactService;
    }

    public function create(Request $request){
        $user  = $request->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "title" => "required",
            "phone" => "required",
            "email" => "required|email",
            "profilePicture" => "required",
            "address" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $newContact = $this->contactService->create($user->id ,$request->all());
        return response()->json($newContact, 200);
    }


}
