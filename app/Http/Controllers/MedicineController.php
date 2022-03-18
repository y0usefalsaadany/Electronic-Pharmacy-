<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
class MedicineController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'medicine_name'=>'required|max:50|unique:medicines,medicine_name',
            'price'=>'required|max:5',
            'photo'=>'required|mimes:jpg,jpeg,png'
        ]);
        $medicines = new Medicine();
        $medicines->medicine_name = $request->input('medicine_name');
        $medicines->price = $request->input('price');
        $file = $request->file('photo');
        $extention = $file->getClientOriginalExtension();
        $fileName= uniqid().'.'. $extention;
        $file->move('uploads/medicines/',$fileName);
        $medicines->photo = $fileName;
        $medicines->save();
        return redirect('/admin/panel')->with('message','your medicine has been added');
    }

    public function show(){
        if (session()->has('loginId')) {
            $medicines = Medicine::latest();
            $i= 1;
            return view('admin.medicines',[
                'medicines'=>$medicines->paginate(),
                'i'=>$i
            ]);
        }
        return redirect('/admin/dashLogin');
    }
    public function find(){
        $medicines = Medicine::latest();
        $medicines->where('medicine_name','like','%'.request('search').'%');
        $i= 1;
        return view('admin.medicines',[
            'medicines'=>$medicines->paginate(),
            'i'=>$i
        ]);
    }
    public function edit($id){
        $medicines = Medicine::find($id);
        $data = request()->validate([
            'medicine_name'=>'required|max:50',
            'price'=>'required|max:5',
        ]);
        $medicines->update($data);
        return redirect('/admin/medicines')->with('message','your medicine has been updated');
    }
    public function delete($id){
        $medicines = Medicine::find($id);
        $medicines->delete();
        return redirect('/admin/medicines')->with('message','your medicine has been deleted');
    }
}
