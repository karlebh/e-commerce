<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Category relationship with User Model
     * 
     * @return App\Models\User
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Category relationship with Product Model
     * 
     * @return App\Models\Product
     */
    public function products()
    {
    	return $this->belongsTo(Product::class);
    }

    
}
