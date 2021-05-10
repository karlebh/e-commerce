<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

	/**
	* The attributes that are mass assignable.
	* 
	* @var array
	*/
    protected $guarded = [];

    /**
    * Use slug as the route key name
    *
    * @return String
    */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * Product Relationship with Order 
     * 
     * @return App\Models\Order
    */
    public function orders()
    {
    	return $this->belongsToMany(Order::class);
    }   

    /**
     * Product Relationship with Category 
     * 
     * @return App\Models\Category
    */
    public function category()
    {
        return $this->hasOne(Category::class);
    }

}
