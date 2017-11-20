<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = [
      'name','quantity','sku','price','reduce','category_id','featured','brand_id','description','spec'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function featuredImage()
    {
        $image = $this->images()->where('featured',1)->first();
        if(!$image){
            return null;
        }
        return $image;
    }


}
