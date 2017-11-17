<?php

namespace App\Concern;


use App\Product;
use App\Repositories\DroboxStorage;
use Illuminate\Http\UploadedFile;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

trait UploadImage
{

    public function upload($parent, UploadedFile $file, DroboxStorage $droboxStorage)
    {
        $parentName = strtolower(str_plural(class_basename($parent)));
        $droboxStorage->getConnection()->put("heroku/{$parentName}/{$parent->id}/{$this->name}", $file->getPathname());
        return $this->name;
    }

    public function imageUrl(): string
    {

        return url($this->getParentDir() . '/' . $this->name);
    }

    public function deleteImage()
    {
        if (file_exists($file = public_path("images/products/{$this->product->id}/{$this->name}"))) {
            unlink($file);
        }
    }

    private function getBaseDir($parent):?string
    {
        $dir = [];
        $dir['base_name'] = str_plural(class_basename($this));
        $dir['parent_name'] = str_plural(class_basename($parent));
        $dir['parent_sub_dir'] = $parent->id;
        return strtolower(join('/', $dir));
    }

    private function getParentDir(): string
    {
        $dir = [];
        $parent = $this->product;
        $dir['base_name'] = str_plural(class_basename($this));
        $dir['parent_name'] = str_plural(class_basename($parent));
        $dir['parent_id'] = $parent->id;
        return strtolower(join('/', $dir));
    }


}