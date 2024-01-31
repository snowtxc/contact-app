<?php

namespace App\Services;

use  App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use App\Services\FileService;

class ContactService
{

    public function __construct(FileService $fileService){
        $this->fileService = $fileService;
    }


    public function list(){
        $contacts = Contact::all()->map(function ($contact) {
            return [
                'id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'address' => $contact->address,
                'title' => $contact->title,
                'profilePicture' => $this->fileService->getRealPath($contact->profilePicture)
            ];
        });
        return $contacts;
    }

    public function getById($id){
        $contact = Contact::find($id);
        return [
            "id" => $contact->id,
            "name" => $contact->name,
            "email"=> $contact->email,
            "address" => $contact->address,
            "title" => $contact->title,
            "phone" => $contact->phone,
            'profilePicture' => $this->fileService->getRealPath($contact->profilePicture)
        ];

    }

    public function create($userId, $data)
    {
       $newContact = new Contact;
       $newContact->name = $data['name'];
       $newContact->email = $data['email'];
       $newContact->address = $data['address'];
       $newContact->title = $data['title'];
       $newContact->phone = $data['phone'];
       if(isset($data['avatar'])){  // If avatar is different than null, then it is saved on the disk and a reference is obtained
            $avatarFile = $data['avatar'];
            $avatarFileName = uniqid().'.'.$avatarFile->getClientOriginalExtension();
            $newContact->profilePicture = $this->fileService->upload("public/avatars" ,$avatarFile, $avatarFileName);
       }
       $newContact->user_id = $userId;
       $newContact->save();
       return [
        "id" => $newContact->id,
        "name" => $newContact->name,
        "email"=> $newContact->email,
        "address" => $newContact->address,
        "title" => $newContact->title,
        "phone" => $newContact->phone,
        'profilePicture' => $this->fileService->getRealPath($newContact->profilePicture)
        ];
    }

    public function update($id, $data)
    {
        $contact  = Contact::find($id);
        if(!isset($contact)){
            return;
        }
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->address = $data['address'];
        $contact->title = $data['title'];
        $contact->phone = $data['phone'];
        if(isset($data['avatar'])){
            if(isset($contact->profilePicture)){
                $this->fileService->deleteFile($contact->profilePicture);
            }
            $avatarFile = $data['avatar'];
            $avatarFileName = uniqid().'.'.$avatarFile->getClientOriginalExtension();
            $contact->profilePicture = $this->fileService->upload("public/avatars" ,$avatarFile, $avatarFileName);
       }
       $contact->save();
       return [
        "name" => $contact->name,
        "email"=> $contact->email,
        "address" => $contact->address,
        "title" => $contact->title,
        "phone" => $contact->phone,
        'profilePicture' => $this->fileService->getRealPath($contact->profilePicture)
        ];


    }


}
