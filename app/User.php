<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin():bool
    {
        return $this->admin == true;
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function cartCount()
    {
        return $this->carts()->count();
    }
    public function alreadyAddToCart(Product $product):bool
    {
       return $this->carts()->where('product_id',$product->id)->exists();
    }
}
