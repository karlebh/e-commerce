<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index')
            ->with('cartContents', \Cart::session('guest')->getContent());
    }

    public function store(Request $request)
    {

    	if (\Cart::session('guest')->get($request->id)) {

            $qty = \Cart::session('guest')->get($request->id)->quantity;
            $name = \Cart::session('guest')->get($request->id)->name;

            \Cart::session('guest')->update($request->id, ['quantity' => 1,]);
            Product::find($request->id)->decrement('quantity');

    		session()->flash('success', 'Item ' . $name . ' quantity has been updated in cart! Present item quantity is ' . ++$qty); 

            return redirect()->back();   	
    	}

    	$cart = \Cart::session('guest')->add($request->all());

        Product::find($request->id)->decrement('quantity');

        session()->flash('success', 'Item ' . $request->name .' successfully added to cart!'); 

    	return redirect()->back();
    }

    public function update(Request $request, $id)
    {
    	\Cart::session('guest')->update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
            ],
        ]);

        session()->flash('success', 'Item quantity successfully changed!'); 
        
        return redirect()->back();
    }

    public function destroy($id)
    {
    	\Cart::session('guest')->remove($id);

         session()->flash('success', 'Item successfully removed!'); 

    	return redirect()->back();
    }

    public function all()
    {
        \Cart::session('guest')->clear();
    	return [\Cart::session('guest')->getContent()];
    }
}
