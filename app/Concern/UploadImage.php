<?php

namespace App\Concern;


use App\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

trait UploadImage
{

    public function upload(UploadedFile $file, $parent)
    {
        return Storage::putFileAs($this->getBaseDir($parent), $file, $this->name,'public');
    }

    public function imageUrl():string
    {
        return Storage::url($this->getParentDir().'/'.$this->name);
    }

    public function deleteImage()
    {
       unlink(public_path("images/products/{$this->product->id}/{$this->name}"));
    }

    private function getBaseDir($parent):?string
    {
        $dir = [];
         $dir['base_name'] = str_plural(class_basename($this));
        $dir['parent_name'] = str_plural(class_basename($parent));
        $dir['parent_sub_dir'] = $parent->id;
        return strtolower(join('/',$dir)) ;
    }
    private function getParentDir():string
    {
      $dir = [];
      $parent = $this->product;
      $dir['base_name'] = str_plural(class_basename($this));
      $dir['parent_name'] = str_plural(class_basename($parent));
      $dir['parent_id'] = $parent->id;
      return strtolower(join('/',$dir));
    }


}