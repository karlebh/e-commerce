<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function show($id)
    {
        return view('category.show')
        	->withProducts(
        		Product::where('quantity', '>', 0)
        			->where('category_id', $id)->paginate()
        	);
    }

}
