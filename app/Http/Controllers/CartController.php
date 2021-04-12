<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {

    	$item = \Cart::session('guest')->get($request->all()['id']);

    	if ($item) {
    		session()->flash('message', 'Item already in cart!'); 
            return redirect()->back();   	
    	}

    	\Cart::session('guest')->add($request->all());

    	return redirect()->back();
    }

    public function index(Request $request)
    {
    	return view('cart.index')
    		->with('cartContents', \Cart::session('guest')->getContent());
    }

    public function update($id)
    {
    	\Cart::session('guest')->update($id, $request->all()['id']);
        
        return redirect()->back();
    }

    public function destroy($id)
    {
    	\Cart::session('guest')->remove($id);

    	return redirect()->back();
    }

    public function editQuantity(Request $request, $id)
    {
    	$request->quantity;

    	// \Cart::update($id, [
    	// 	'quantity' => $request->quantity,
    	// ]);
    }

    public function all()
    {
    	return [\Cart::session('guest')->getContent()];
    }
}
