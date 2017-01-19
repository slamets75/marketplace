<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Custom\cartTrait;
use App\Custom\Cart;
use Braintree_ClientToken;


class CartController extends Controller
{
    use cartTrait;

    public function index()
    {
    	$data = $this->buildCartElements();
    	return view('cart.index', $data);
    } 

    public function cartAjax(Request $request)
    {
    	$this->updateCart($request->key, $request->qnt);
    	$data = $this->buildCartElements();
    	return json_encode($data);
    }

    public function test()
    {
        echo($clientToken = Braintree_ClientToken::generate());
    }



    
}
