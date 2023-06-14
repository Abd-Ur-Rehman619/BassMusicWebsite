<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use File;
class UserController extends Controller
{
    //
    public function Register(Request $req){
        $req->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
            'contact_no' => 'required|numeric|digits:11|regex:/^((0)?)(3)([0-9]{9})$/',
            'address' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'user_type' => 'required',
            'captcha' => 'required|captcha',
        ]);
        $user = new User();
        $user->Name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->Address = $req->address;
        $user->contact_no = $req->contact_no;
        $user->User_type = $req->user_type;
        // $user->status = 'inactive';
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('Admin/user images'), $imageName);
        $user->profile = $imageName;

        $ok = $user->save();
        if($ok){
            return back()->with('success','Success! Your Account is successfully created.Admin will Approve your request. Then You can Login. Thnak You!!!');
        }else{
            return back()->with('failed', 'Fail to Registered');
        }

    }

    // Login Function for User Account
    public function loginCheck(Request $req){
        $req->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ],
        [
            'email.exists' => 'The Email you entered Not Exists in Database',
        ]);

        $check = $req->only('email', 'password');
        if(Auth::guard('web')->attempt($check))
        { 
            if(auth()->user()->status=='active')
            {
                if(auth()->user()->User_type == 'Normal-User' && auth()->user()->status == 'active')
                {
                   return redirect('Visitor/dashboard')->with('success','You Successfully Login');
                }
                if(auth()->user()->User_type == 'Creator' && auth()->user()->status == 'active')
                {
                   return redirect('Creator/dashboard')->with('success','You Successfully Login');
                }
                else{
                    return back()->with('failed', 'Invalid User');
                }
            }
            else{
                
              return back()->with('failed', 'Your Account is Not Active by the Admin');
            }
        }
        else{
            return back()->with('failed', 'Incoorect Password! Failed to Login');
        }
    }

    public function visitors(){
        $users = User::whereIn('User_type', ['Normal-User'])->get();
        return view('Admin.NormalUsers')->with('users', $users);
    }

    public function normalUsers(){
        $users = User::whereIn('User_type', ['Normal-User'])->get();
        return view('Creator.NormalUsers')->with('users', $users);
    }

    function updateStatus(Request $request, $id){
        $user = User::find($id);
        if($user->status == 'active'){
            $user->status = 'inactive';
        }else{
            $user->status = 'active';
        }
        $user->save();
        return redirect()->back();
    }

    function creators(){
        $users = User::whereIn('User_type', ['Creator'])->get();
        return view('Admin.creators')->with('users', $users);
    }

    public function addNewUser(Request $req){
        $req->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'contact_no' => 'required|numeric|digits:11|regex:/^((0)?)(3)([0-9]{9})$/',
            'address' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'user_type' => 'required',
        ]);

        $user = new User();
        $user->Name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->Address = $req->address;
        $user->contact_no = $req->contact_no;
        $user->User_type = $req->user_type;
        $user->status = 'active';
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('Admin/user images'), $imageName);
        $user->profile = $imageName;

        $ok = $user->save();
        if($ok){
            return back()->with('success','Success! Account is successfully created!!!');
        }else{
            return back()->with('failed', 'Fail to Registered');
        }

    }

    function editUser($id){
        $user = User::find($id);
        return view('Admin.updateUser')->with('user_info', $user);
    }

    function edit($id){
        $user = User::find($id);
        return view('Creator.updateUser')->with('user_info', $user);
    }

    function updateUser(Request $request, $id){
        $user = User::find($id);
        $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u|min:3',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'contact_no' => 'required|numeric|digits:11|regex:/^((0)?)(3)([0-9]{9})$/',
            'User_type' => 'required',
            'status' => 'required',
            'address' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $user->Name = $request->name;
        $user->email = $request->email;
        $user->Address = $request->address;
        $user->contact_no = $request->contact_no;
        $user->User_type = $request->User_type;
        $user->status = $request->status;

        if($request->hasFile('image')){
            // Get Image Path from Folder
            $path = 'Admin/user images/'. $user->profile;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('Admin/user images'), $imageName);
            $user->profile = $imageName;
        }

        $ok = $user->save();
        if($ok){
            return back()->with('success',' Profile is successfully Updated!!!');
        }else{
            return back()->with('failed', 'Fail to Update Profile');
        }
    }

    function deleteUser($id){
        $user = User::find($id);
        $ok = $user->delete();
        if($ok){
            return back()->with('success',' Deleted successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Deleted');
        }
    }

    function deletedCreators(){
        $users = User::whereIn('User_type', ['Creator'])->onlyTrashed()->get();
        return view('Admin.deletedCreators')->with('users', $users);;
    }

    function restored($id){
        $user = User::where('id', $id)->withTrashed()->restore();
        if($user){
            return back()->with('success',' Restored successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Restore');
        }
    }

    function permanentlyDelete($id){
        $user = User::where('id', $id)->withTrashed()->forceDelete();
        if($user){
            return back()->with('success',' Permanently Deleted !!!');
        }else{
            return back()->with('failed', 'Fail to delete it Permanently');
        }
    }

    // Logout function
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }
}
