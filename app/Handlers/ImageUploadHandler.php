<?php

namespace App\Handlers;

use Intervention\Image\Facades\Image;

class ImageUploadHandler
{
    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @param $folder
     * @param int|bool $max_width
     * @return string
     */
    public function save($file, $folder, $max_width = false)
    {
        $folder_name = "uploads/images/$folder/".date('Y', time()).'/'.date('m', time()).'/'.date('d', time()).'/';

        $image = Image::make($file);

        // Resize
        if ($max_width) {
            $image->fit($max_width);
        }

        $file_path = $folder_name.$file->hashName();
        \Storage::disk('public')->put($file_path, $image->encode());

        return $file_path;
    }
}
