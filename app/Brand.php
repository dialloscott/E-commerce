<?php

namespace App;

use App\Concern\Utility;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Utility;
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
