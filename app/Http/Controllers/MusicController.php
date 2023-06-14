<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
use File;
use Auth;
class MusicController extends Controller
{
    //
    public function index(){
        $musics = Upload::with(['user', 'category'])->get();
        return view('admin.musics')->with('musics', $musics);
    }

    public function musics(){
        $id = Auth::user()->id;
        $musics = Upload::where('Author',$id)->with(['user', 'category'])->get();
        return view('Creator.musics')->with('musics', $musics);
    }
    function addMusic(){
        $id = Auth::user()->id;
        $categories = Category::where('User_ID',$id)->get();
        return view('Creator.addMusic')->with('categories', $categories);
    }
    function editMusic($id){
        $music = Upload::find($id);
        $id = Auth::user()->id;
        $categories = Category::where('User_ID',$id)->get();
        return view('Creator.updateMusic')->with(['music_data'=> $music, 'categories'=> $categories]);
    }
    function showMusic($id){
        $music = Upload::find($id);
        $comments = Comment::where('musicId',$id)->with(['user'])->get();
        $likes = Like::where('music_ID',$id)->get();
        $liked = Like::where('music_ID',$id)->where('state','Liked')->get();
        return view('Creator.music_details')->with(['music'=> $music, 'comments'=> $comments,
                                                    'likes'=> $likes, 'liked'=> $liked ]);
    }

    public function create(){
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.addMusic')->with('users', $users);
    }

    function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'posted_by' => 'required',
            'cat' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'music' => 'required|mimes:mp3,wav|max:10240',
        ]);

        $music = new Upload();
        $music->Date = $request->date;
        $music->title = $request->title;
        $music->Author = $request->posted_by;
        $music->catId = $request->cat;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('Admin/uploads/'), $imageName);
        $music->image = $imageName;

        $musicName = time().'.'.$request->music->extension();
        $request->music->move(public_path('Admin/uploads/'), $musicName);
        $music->music = $musicName;

        $ok = $music->save();
        if($ok){
            return back()->with('success',' Music File is successfully Uploaded!!!');
        }else{
            return back()->with('failed', 'Fail to Upload File');
        }
    }

    function show($id){
        $music = Upload::find($id);
        $comments = Comment::where('musicId',$id)->with(['user'])->get();
        $likes = Like::where('music_ID',$id)->get();
        return view('admin.music_details')->with(['music'=> $music, 'comments'=> $comments, 'likes'=> $likes ]);
    }

    function edit($id){
        $music = Upload::find($id);
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.updateMusic')->with(['music_data'=> $music, 'users'=> $users]);
    }

    function update(Request $request, $id){
        $music = Upload::find($id);
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'posted_by' => 'required',
            'cat' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'music' => 'nullable|mimes:mp3,wav|max:10240',
        ]);

        $music->Date = $request->date;
        $music->title = $request->title;
        $music->Author = $request->posted_by;
        $music->catId = $request->cat;

        if($request->hasFile('image')){
            // Get Image Path from Folder
            $path = 'Admin/uploads/'. $music->image;
            if(File::exists($path))
            {
                File::delete($path);
            }

           $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('Admin/uploads/'), $imageName);
            $music->image = $imageName;

        }
        if($request->hasFile('music')){
            // Get Image Path from Folder
            $path = 'Admin/uploads/'. $music->music;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $musicName = time().'.'.$request->music->extension();
            $request->music->move(public_path('Admin/uploads/'), $musicName);
            $music->music = $musicName;
        }
        $ok = $music->save();
        if($ok){
            return back()->with('success',' Music is successfully Updated!!!');
        }else{
            return back()->with('failed', 'Fail to Update Music');
        }

    }

    function destroy($id){
       $music = Upload::find($id);
    //    $imagepath = 'Admin/uploads/'. $music->image;
    //    $musicpath = 'Admin/uploads/'. $music->music;
    //         if(File::exists($imagepath) && File::exists($musicpath))
    //         {
    //             File::delete($imagepath);
    //             File::delete($musicpath);
    //         }
        $ok = $music->delete();
        if($ok){
            return back()->with('success',' Deleted successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Deleted');
        }
    }


    // Visitor or Normal-User Functions
    public function userMusics(){
        $musics = Upload::with(['user', 'category'])->get();
        return view('Visitors.musics')->with('musics', $musics);
    }

    function userShowMusic($id){
        $music = Upload::find($id);
        $comments = Comment::where('musicId',$id)->with(['user'])->get();
        $likes = Like::where('music_ID',$id)->get();
        $liked = Like::where('music_ID',$id)->where('state','Liked')->get();
        return view('Visitors.music_details')->with(['music'=> $music, 'comments'=> $comments,
                                                    'likes'=> $likes, 'liked'=> $liked ]);
    }
}
