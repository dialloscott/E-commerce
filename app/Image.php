<?php

namespace App;

use App\Concern\UploadImage;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use UploadImage;

    protected $fillable = ['name', 'featured','public_id','secure_url'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
