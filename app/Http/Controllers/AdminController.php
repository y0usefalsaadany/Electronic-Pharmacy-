<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
    public function dashLogin(){
        if (session()->has('loginId')) {
            return view('admin/admin-panel');
        }
        return view('admin/dash-login');
    }

    public function dashboard(){
        if (session()->has('loginId')) {
            return view('admin/admin-panel');
        }
        return redirect('/admin/dashLogin');
    }

    public function showAdmin(){
        if (session()->has('loginId')) {
            $admins = Admin::latest();
            $i= 1;
            return view('admin.admins',[
                'admins'=>$admins->paginate(),
                'i'=>$i
            ]);
        }
        return redirect('/admin/dashLogin');
    }

    public function addAdmin(){
        if (session()->has('loginId')) {
            return view('admin/add-admin');
        }
        return redirect('/admin/dashLogin');
    }

    public function add(){
        $data = request()->validate([
            'name'=>'required|max:50',
            'email'=>'required|max:50|unique:users,email',
            'password'=>'required|max:25',
            'is_admin'=>'required|max:1',
        ]);
        $data['password']= Hash::make($data['password']);
        $user = new Admin();
        $user->create($data);
        return redirect('/admin/add-admin')->with('message','admin has been added');
    }

    public function login(Request $req){
        $data =  request()->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $users = Admin::where('email','=',$req->email)->first();


        if($users){
            if(Hash::check($req->password, $users->password)){
                session()->put('loginId',$users->id);
                return redirect('/admin/panel');
            }else{
                return redirect('/admin/dashLogin')->with('failed','sorry this password is not correct');
            }
        }else{
            return redirect('/admin/dashLogin')->with('failed','sorry this email is not correct');
        }
    }

    public function logout(){
        session()->forget('loginId');
        return view('admin/dash-login');
    }

    public function delete($id){
        $admins = Admin::find($id);
        $admins->delete();
        return redirect('/admin/medicines')->with('message','your medicine has been deleted');
    }

}
