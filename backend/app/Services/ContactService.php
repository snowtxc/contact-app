<?php

namespace App\Services;

use  App\Models\Contact;
use Illuminate\Support\Facades\Hash;

class ContactService
{

    public function list(){
         $contacts = Contact::all();
         return $contacts;
    }

    public function create($userId, $data)
    {
       $newContact = Contact::create(array_merge(["user_id" => $userId] , $data));
       return $newContact;
    }

    public function update($id, $data)
    {
        Contact::update($id, $data);
        $contactUpdated = Contact::find($id);
        return $contactUpdated;
    }

}
