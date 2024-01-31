<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function upload($folder, $file, $fileName){
        $path = $file->storeAs($folder,$fileName);
        return $path;
    }

    public function getRealPath($path){
        return env('APP_URL').":".env("APP_PORT").Storage::url($path);
    }

    public static function deleteFile($filePath)
    {
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }


}
