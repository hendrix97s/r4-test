<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
  public function getPathAndUrl($image, string $disk)
  {
    $storage = Storage::disk($disk)->putFile('', $image);
    return [
      'image' => $storage,
      'image_url'  => asset(Storage::disk($disk)->url($storage)),
    ];
  }

  public function delete($image, string $disk)
  {
    return Storage::disk($disk)->delete($image);
  }
}