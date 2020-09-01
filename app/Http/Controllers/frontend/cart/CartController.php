<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Order,ProductsOrder};
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{

    public function cart(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::subtotal(0,',','.');
        // dd($data);
        return view('frontend.cart.cart',$data);
    }
    public function checkout(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::subtotal(0,',','.');
        return view('frontend.cart.checkout',$data);
    }
    public function complete(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::subtotal(0,',','.');
        return view('frontend.cart.complete',$data);
    }
    public function addToCart(Request $request){
        $product = Product::find($request->id_product);
        if($request->has('quantity')){
            $qty = $request->quantity;
        }else{
            $qty = 1;
        }
        Cart::add([
            'id' => $product->code,
            'name' =>$product->name,
            'qty' => $qty,
            'price' =>$product->price,
            'weight' => 0,
            'options' => ['img' => $product->img]
        ]);
        return redirect()->route('cart');
    }
    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->qty);

    }
    public function delete($rowId){
        Cart::remove($rowId);
        return redirect()->route('cart');
    }

    public function paid(Request $request){
        $order = new Order;
        $order->full = $request->full;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address =  $request->address;
        $order->state = 2;
        $order->total =  Cart::subtotal(0, '', '');
        $order->save();

        $carts = Cart::content();
        foreach($carts as $item){
            $product_order = new ProductsOrder;
            $product_order->code = $item->id;
            $product_order->name = $item->name;
            $product_order->price = $item->price;
            $product_order->quantity = $item->qty;
            $product_order->image = $item->options->img;
            $product_order->order_id = $order->id;
            $product_order->save();
        }
        Cart::destroy();
        return redirect()->route('complete');
    }
}
