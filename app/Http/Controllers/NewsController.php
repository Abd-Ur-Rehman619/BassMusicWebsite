<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use File;
use Auth;
class NewsController extends Controller
{
    //
    public function index(){
        $news = News::with('user')->get();
        return view('admin.News')->with('news', $news);
    }

    public function news(){
        $id = Auth::user()->id;
        $news = News::where('UID',$id)->with('user')->get();
        return view('Creator.News')->with('news', $news);
    }
    function addNews(){
        return view('Creator.addNews');
    }
    function editNews($id){
        $news = News::find($id);
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('Creator.updateNews')->with(['news_data'=> $news, 'users'=> $users]);
    }

    function create(){
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.addNews')->with('users', $users);
    }

    function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'hosted_by' => 'required',
            'description' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $newz = new News();
        $newz->News_Title = $request->title;
        $newz->News_Description = $request->description;
        $newz->News_Date = $request->date;
        $newz->UID  = $request->hosted_by;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('Admin/News Images/'), $imageName);
        $newz->news_image = $imageName;

        $ok = $newz->save();
        if($ok){
            return back()->with('success',' News is successfully Added!!!');
        }else{
            return back()->with('failed', 'Fail to Add News');
        }

    }

    function show($id){
        return "ok";
    }

    function edit($id){
        $news = News::find($id);
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.updateNews')->with(['news_data'=> $news, 'users'=> $users]);
    }

    function update(Request $request, $id){
        $newz = News::find($id);
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'hosted_by' => 'required',
            'description' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $newz->News_Title = $request->title;
        $newz->News_Description = $request->description;
        $newz->News_Date = $request->date;
        $newz->UID  = $request->hosted_by;

        if($request->hasFile('image')){
            // Get Image Path from Folder
            $path = 'Admin/News Images/' . $newz->news_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('Admin/News Images/'), $imageName);
        $newz->news_image = $imageName;

        }
        $ok = $newz->save();
        if($ok){
            return back()->with('success',' News is successfully Updated!!!');
        }else{
            return back()->with('failed', 'Fail to Update News');
        }

    }

    function destroy($id){
       $news = News::find($id);
    //    $path = 'Admin/News Images/'. $news->news_image;
    //         if(File::exists($path))
    //         {
    //             File::delete($path);
    //         }
        $ok = $news->delete();
        if($ok){
            return back()->with('success',' Deleted successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Deleted');
        }
    }


    // Visitor or Normal-User
    public function userNews(){
        $news = News::with('user')->get();
        return view('Visitors.News')->with('news', $news);
    }
}
