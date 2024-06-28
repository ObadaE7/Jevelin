<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use Intervention\Image\Typography\FontFactory;

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

        // $image->text('JEVELIN', $positionX, $positionY, function (FontFactory $font) {
            // $font->size(1000);
            // $font->color('fff');
            // $font->filename('./fonts/comic-sans.ttf');
            // $font->stroke('ff5500', 2);
            // $font->align('center');
            // $font->valign('middle');
            // $font->lineHeight(1.6);
            // $font->angle(10);
            // $font->wrap(250);
        // });
        $finalPath = $folder . basename($tempPath);
        $image->save(storage_path('app/public/' . $finalPath));

        Storage::disk('public')->delete($tempPath);

        return $finalPath;
    }
}
