<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
  public function getPathAndUrl($image, string $disk)
  {
    $storage = Storage::disk($disk)->putFile('', $image);
    return [
      'path' => $storage,
      'url'  => asset(Storage::disk($disk)->url($storage)),
    ];
  }
}