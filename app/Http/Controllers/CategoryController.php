<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use File;
use Auth;
class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::with('user')->get();
        return view('admin.Categories')->with('categories', $categories);
    }

    public function categories(){
        $id = Auth::user()->id;
        $categories = Category::where('User_ID',$id)->with('user')->get();
        return view('Creator.Categories')->with('categories', $categories);
    }
    public function addCategory(){
        return view('Creator.addCategory');
    }
     public function editCategory($id){
        $category = Category::find($id);
        return view('Creator.updateCategory')->with(['category_data'=> $category]);
    }

    public function create(){
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.addCategory')->with('users', $users);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'hosted_by' => 'required',
            'description' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $category = new Category();
        $category->Cat_title = $request->title;
        $category->Cat_Description = $request->description;
        $category->User_ID = $request->hosted_by;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('Admin/Category Images/'), $imageName);
        $category->Cat_image = $imageName;

        $ok = $category->save();
        if($ok){
            return back()->with('success',' Category is successfully Added!!!');
        }else{
            return back()->with('failed', 'Fail to Add Category');
        }
    }

    public function show($id){
        return "ok show";
    }

    public function edit($id){
        $category = Category::find($id);
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.updateCategory')->with(['category_data'=> $category, 'users'=> $users]);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
         $request->validate([
            'title' => 'required|min:3',
            'hosted_by' => 'required',
            'description' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $category->Cat_title = $request->title;
        $category->Cat_Description = $request->description;
        $category->User_ID = $request->hosted_by;

        if($request->hasFile('image')){
            // Get Image Path from Folder
            $path = 'Admin/Category Images/'. $category->Cat_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('Admin/Category Images/'), $imageName);
        $category->Cat_image = $imageName;

        }
        $ok = $category->save();
        if($ok){
            return back()->with('success',' Category is successfully Updated!!!');
        }else{
            return back()->with('failed', 'Fail to Update Category');
        }
    }

    public function destroy($id){
        $category = Category::find($id);
        // $path = 'Admin/Category Images/'. $category->Cat_image;
        // if(File::exists($path))
        // {
        //     File::delete($path);
        // }
        $ok = $category->delete();
        if($ok){
            return back()->with('success',' Deleted successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Deleted');
        }
    }

    public function fetchCategories(Request $request)
    {
        $data['cat'] = Category::where("User_ID",$request->Uid)->get(["Cat_title", "Cat_ID"]);
        return response()->json($data);
    }

    // Visitor/ Normal-User Function
    public function userCategories(){
        $categories = Category::with('user')->get();
        return view('Visitors.Categories')->with('categories', $categories);
    }
}
