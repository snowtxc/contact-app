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

    public function list(){
        $contacts = $this->contactService->list();
        return response()->json($contacts, 200);
    }

    public function create(Request $request){
        $user  = $request->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "title" => "required",
            "phone" => "required",
            "email" => "required|email",
            "address" => "required",
            "avatar" => "file"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $newContact = $this->contactService->create($user->id ,$request->all());
        return response()->json($newContact, 200);
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "title" => "required",
            "phone" => "required",
            "email" => "required|email",
            "address" => "required",
            "avatar" => "file"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $contact = $this->contactService->getById($id);
        if(!isset($contact)){
            return response()->json(['message' => 'The contact does not exist'],404);
        }

        $contactUpdated = $this->contactService->update($contact['id'], $request->all());
        return response()->json($contactUpdated,200);
    }

    public function getById(Request $request, $id){
        $contact = $this->contactService->getById($id);
        if(!isset($id)){
            return response()->json(['message' => 'The contact does not exist'],404);
        }
        return response()->json($contact, 200);
    }
}
