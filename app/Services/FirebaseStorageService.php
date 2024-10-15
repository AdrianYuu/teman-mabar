<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseStorageService
{
    /**
     * Upload a file to Firebase Storage.
     *
     * @param string $filePath Path to the file in the request.
     * @param string $fileName Name to save the file as in Firebase Storage.
     * @return string The Firebase Storage file URL.
     */
    public static function uploadImage($filePath, $fileName)
    {
        $firebase = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'))
            ->createStorage();

        $storage = $firebase->getBucket();

        $firebaseFilePath = 'gameImages/' . $fileName;

        $storage->upload(fopen($filePath, 'r'), ['name' => $firebaseFilePath]);

        $publicUrl = "https://firebasestorage.googleapis.com/v0/b/"
            . $storage->name()
            . "/o/" . urlencode($firebaseFilePath) . "?alt=media";

        return $publicUrl;
    }
}
