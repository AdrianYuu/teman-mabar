<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseStorageService
{
    /**
     * Upload a file to Firebase Storage.
     *
     * @param \Illuminate\Http\UploadedFile $file The uploaded file to be stored.
     * @return string The Firebase Storage file URL.
     */
    public static function uploadImage($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        $firebase = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'))
            ->createStorage();

        $storage = $firebase->getBucket();

        $firebaseFilePath = 'gameImages/' . $fileName;

        $storage->upload(fopen($file->getRealPath(), 'r'), ['name' => $firebaseFilePath]);

        $publicUrl = "https://firebasestorage.googleapis.com/v0/b/"
            . $storage->name()
            . "/o/" . urlencode($firebaseFilePath) . "?alt=media";

        return $publicUrl;
    }
    
}
