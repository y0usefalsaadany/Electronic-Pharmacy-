<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function show(){
        if (session()->has('loginId')) {
            $order = Order::latest();
            return view('admin.orders',[
                'orders'=>$order->paginate()
            ]);
        }
        return view('admin/dash-login');
    }

    public function buy(){
        $data = request()->validate([
            'medicine_name'=>'required|max:25',
            'person_name'=>'required|max:50',
            'address'=>'required|max:100',
            'phone'=>'required|max:25',
        ]);
        $order = new Order();
        $order->create($data);
        return redirect('/find')->with('message','medicine has been sent');
    }
    
    public function delete($id){
        $order = Order::find($id);
        $order->delete();
        return redirect('/admin/orders')->with('message','order has been deleted');
    }
}
