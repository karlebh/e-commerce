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
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('category_id', 'product_id');
    }

    public function picture()
    {
        // switch (rand(1, 5)) {
        //     case 1:
        //         return "first";
        //         break;

        //     case 2:
        //         return "second";
        //         break;

        //     case 3:
        //         return "third";
        //         break;

        //     case 4:
        //         return "four";
        //         break;

        //     case 5:
        //         return "five";
        //         break;
            
        //     default:
        //         return "excellent";
        //         break;
        // }
        
        if ($this->categories->category_id = 2) {
            return "yesss!";
        }
    }

}
