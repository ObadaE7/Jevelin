<?php

namespace App\Traits;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;

trait ImageProcessTrait
{
    public function crop($file, $width, $height, $folder, $x = 0, $y = 0)
    {
        $manager = new ImageManager(new Driver());
        $tempPath = $file->store('temp', 'public');
        $imageManager = $manager->read(storage_path('app/public/' . $tempPath));
        $imageManager->crop($width, $height, $x, $y);
        $path = $folder . basename($tempPath);
        $imageManager->save(storage_path('app/public/' . $path));

        return $path;
    }
}
