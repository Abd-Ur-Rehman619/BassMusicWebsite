<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Comment;
use App\Models\User;
use File;
use Auth;
class CommentController extends Controller
{
    //
    public function index(){
        // $comments = Comment::with(['user', 'music'])->get();
        $comments = Comment::with(['user'])->get();
        return view('admin.Comments')->with('comments', $comments);
    }

    public function comments(){
        $id = Auth::user()->id;
        $musics = Upload::where('Author',$id)->get();
        $comments = Comment::where('musicId',$id)->with(['music'])->get();;
        return view('Creator.Comments')->with('comments', $comments);
    }

    function editComment($id){
        $comment = Comment::find($id);
        return view('Creator.updateComment')->with(['comment'=> $comment]);
    }

    public function store(Request $request){
        $request->validate([
            'comments' => 'required|min:3',
            'userId' => 'required',
            'musicId' => 'required',
        ]);

        $comment = new Comment();
        $comment->comments = $request->comments;
        $comment->U_Id = $request->userId;
        $comment->musicId = $request->musicId;
        $comment->Date = now();
        $ok = $comment->save();
        if($ok){
            return back()->with('success',' Comment has been successfully Posted!!!');
        }else{
            return back()->with('failed', 'Fail to Comment');
        }
    }

    function edit($id){
        $comment = Comment::find($id);
        // return $comment = Comment::where('id',$id)->with('music')->get();
        return view('admin.updateComment')->with(['comment'=> $comment]);
    }

     function update(Request $request, $id){
        $comment = Comment::find($id);
        $request->validate([
            'comment' => 'required|min:3',
        ]);
        $comment->comments = $request->comment;

        $ok = $comment->save();
        if($ok){
            return back()->with('success',' successfully Updated!!!');
        }else{
            return back()->with('failed', 'Fail to Update');
        }

    }

    function destroy($id){
       $comment = Comment::find($id);
        $ok = $comment->delete();
        if($ok){
            return back()->with('success','Comment Deleted successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Delete Comment');
        }
    }

    // Visitors Function
    public function userComments(){
        $id = Auth::user()->id;
        $comments = Comment::where('U_Id',$id)->with(['music'])->get();;
        return view('Visitors.Comments')->with('comments', $comments);
    }

    function userEditComment($id){
        $comment = Comment::find($id);
        return view('Visitors.updateComment')->with(['comment'=> $comment]);
    }
}
