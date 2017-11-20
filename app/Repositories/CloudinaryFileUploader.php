<?php

namespace App\Repositories;


use Cloudinary;
use Cloudinary\Uploader;
use Illuminate\Support\Facades\App;

class CloudinaryFileUploader
{

    public function __construct()
    {
        Cloudinary::config(config('services.cloudinary'));
    }

    public function upload($file,array $config = [])
    {
        return Uploader::upload($file,$config);
    }

    public function destroy($public_id,array $config = [])
    {
      return Uploader::destroy($public_id,$config);
    }
}