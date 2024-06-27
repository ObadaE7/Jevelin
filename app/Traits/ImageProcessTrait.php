<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;

trait ImageProcessTrait
{
    protected function storeTempImage($file)
    {
        return $file->store('temp', 'public');
    }

    protected function readImage($path)
    {
        $manager = new ImageManager(new Driver());
        return $manager->read(storage_path('app/public/' . $path));
    }

    public function cropImage($file, $width, $height, $folder, $x = 0, $y = 0)
    {
        $tempPath = $this->storeTempImage($file);
        $image = $this->readImage($tempPath);
        $image->crop($width, $height, $x, $y);

        $finalPath = $folder . basename($tempPath);
        $image->save(storage_path('app/public/' . $finalPath));

        Storage::disk('public')->delete($tempPath);

        return $finalPath;
    }

    public function coverImage($file, $width, $height, $folder)
    {
        $tempPath = $this->storeTempImage($file);
        $image = $this->readImage($tempPath);
        $image->cover($width, $height);

        $finalPath = $folder . basename($tempPath);
        $image->save(storage_path('app/public/' . $finalPath));

        Storage::disk('public')->delete($tempPath);

        return $finalPath;
    }
}
