<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
class AdminController extends Controller
{
    //
    function loginCheck(Request $request)
    {
        $request->validate([
            'User_Name' => 'required|exists:admins,UserName',
            'password' => 'required',
        ],[
            'User_Name.exists' => 'This username Not Exists',
        ]);

        $username = $request->User_Name;
        $pass = $request->password;
        if(Auth::guard('admin')->attempt(['UserName' => $username, 'password' => $pass])){
            return redirect()->route('admin.dashboard');
        }else{
            return  redirect()->back()->with('error', 'You have Entered Incorrect Password');
        }
    }

    //
    function editProfile(Request $request)
    {
        $admin_ID = $request->id;
        $request->validate([
            'User_Name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $user = Admin::find($admin_ID);
        $user->UserName = $request->User_Name;
        $user->email = $request->email;
        $ok = $user->save();
        if($ok){
            return back()->with('success','Success! successfully Updated!!!');
        }else{
            return back()->with('failed', 'Fail to Update!!!');
        }
    }

    function logout(){
         Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
