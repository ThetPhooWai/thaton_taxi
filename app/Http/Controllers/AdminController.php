<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getdashboard(){
        return view('admin.dashboard');
    }
    public function getLogout(){

        Auth::logout();
        return redirect()->route('login');


    }
    public function getSetting(){
        return view('admin.setting');
    }
    public  function updatePassword(Request $request){
        $this->validate($request,[
            'current_password'=>'required',
            'new_password'=>'required|min:6',
            'retype_password'=>'required|same:new_password'
        ]);
        $user=User::whereId(Auth::id())->firstOrFail();
        $oldPassword=$user->password;
        if(!Hash::check($request['current_password'],$oldPassword)){
            return redirect()->back()->with('error',"Invalid current password");
        }else{
            $user->password=bcrypt(($request['new_password']));
            $user->update();
            return redirect()->back()->with('info',"Your password have been change.");
        }

    }

}
