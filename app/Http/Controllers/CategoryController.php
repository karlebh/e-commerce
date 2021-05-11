<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function show($slug)
    {
    	$id = Category::whereSlug($slug)->pluck('id')[0];

        return view('category.show')
        	->withProducts(
        		Product::where('quantity', '>', 0)
        			->where('category_id', $id)->paginate()
        	);
    }

}
