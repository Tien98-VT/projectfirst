<?php

namespace App\Http\Controllers\frontend\Product;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function shop(){
        $data['products'] = Product::paginate(6);
        $data['categories'] = Category::all();
        return view('frontend.product.shop',$data);
    }
    public function filter(Request $request){
        $data['products'] = Product::whereBetween('price', [$request->start, $request->end])->paginate(2);
        $data['products']->appends(['start' => $request->start,'end' => $request->end]);

        $data['categories'] = Category::all();
        return view('frontend.product.shop',$data);
    }
    public function detail($slug_product){
        $newest_prd = Product::orderBy('id','desc')->take(4)->get();
        $data['newest'] = $newest_prd;
        $data['product'] = Product::where('slug',$slug_product)->first();

        return view('frontend.product.detail', $data);
    }
}
