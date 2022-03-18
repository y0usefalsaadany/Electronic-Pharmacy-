<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class HomeController extends Controller
{
    public function show(){
        $medicines = Medicine::latest();
        $medicines->where('medicine_name','like','%'.request('search').'%');
        return view('front.index',[
            'medicines'=>$medicines->paginate(10)
        ]);
    }

    public function find(){
        $medicines = Medicine::latest();
        $medicines->where('medicine_name','like','%'.request('search').'%');
        return view('front.search',[
            'medicines'=>$medicines->paginate()
        ]);
    }
}
