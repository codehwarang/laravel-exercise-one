<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait HasImage
{
    protected function uploadImage(UploadedFile $file, string $filename, string $directory): string
    {
        $originalExtension = $file->getClientOriginalExtension();
        $filename = $filename . '.' . $originalExtension;

        return $file->storeAs(
            $directory,
            $filename,
            'public'
        );
    }
}
