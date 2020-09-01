<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Order;
class BackendController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $current_month = $now->format('m');
        $current_year = $now->format('Y');
        for($i=1; $i<=$current_month; $i++){
            $arr['Tháng 0'.$i] = Order::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$current_year)->sum('total');
         }
          $data['charData'] = $arr;
          $data['totalOrder']= Order::where('state',2)->whereYear('updated_at',$current_year)->count();
          $data['currentMonth'] = $current_month;
        return view('backend.index',$data);

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('Login');

    }


}
