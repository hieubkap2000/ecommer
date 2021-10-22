<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Web\CartService;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function cart()
    {
        $cartContent = $this->cartService->cart();
        //dd($cartContent);
        return view('web.cart.index')->with('cartContent', $cartContent);
    }

    public function addToCart(Request $request)
    {
        return $this->cartService->addToCart($request->all());
    }

    public function cartHeader()
    {
        return $this->cartService->cart();
    }

    public function cartUpdate(Request $request)
    {
        $message =  $this->cartService->cartUpdate($request);
        return redirect()->back()->with('message', $message);
    }

    public function cartRemove(Request $request)
    {
        $message =  $this->cartService->cartRemove($request);
        return redirect()->back()->with('message', $message);
    }
}
