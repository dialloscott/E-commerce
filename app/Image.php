<?php

namespace App;

use App\Concern\UploadImage;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use UploadImage;

    protected $fillable = ['name', 'featured'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public static function boot()
    {
        parent::boot();
        static::deleting(function (Image $image){
         $image->deleteImage();
        });
    }
}
