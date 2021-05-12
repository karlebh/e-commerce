<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(ProductFormRequest $request)
    {
        auth()->user()->firstOrCreate($request->validated());

        session()->flash('message', 'product created successfully');

        return back();
    }
}
