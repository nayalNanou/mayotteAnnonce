<?php
namespace App\Service;

class FileHandler
{
    public function uploadFile($file, $folder)
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $originalNameParts = explode('.', $originalName);
        $fileName = '';

        foreach ($originalNameParts as $key => $value) {
            if ($key < (count($originalNameParts) - 1)) {
                $fileName .= $value;
            }
        }

        $fileName .= uniqid() . '.' . $extension;

        $pathName = $file->getPathName();

        move_uploaded_file($pathName, __DIR__ . '/../../public/' . $folder . '/' . $fileName);

        return $fileName;
    }

    public function deleteFile($fileName, $folder)
    {
        unlink(__DIR__ . '/../../public/' . $folder . '/' . $fileName);
    }
}