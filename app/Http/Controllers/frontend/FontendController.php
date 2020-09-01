<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FontendController extends Controller
{
    public function index(){
        $newest_prd = Product::orderBy('id','desc')->take(8)->get();
        $featured_prd = Product::where('featured',1)->orderBy('id','desc')->take(4)->get();
        $data['newest'] = $newest_prd;
        $data['featured'] = $featured_prd;
        return view('frontend.index',$data);
    }

    public function about(){
        return view('frontend.about.about');
    }
    public function contact(){
        return view('frontend.about.contact');
    }
}
