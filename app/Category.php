<?php

namespace App;

use App\Concern\Utility;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Utility;
    protected $fillable = ['name'];



}
