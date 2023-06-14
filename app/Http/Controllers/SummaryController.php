<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Comment;
use App\Models\Like;
use Auth;
class SummaryController extends Controller
{
    //
    public function index(){
        $musics = Upload::with(['comments', 'likes'])->get();
        return view('admin.summary')->with('musics', $musics);
    }

    public function summaries(){
        $id = Auth::user()->id;
        $musics = Upload::where('Author',$id)->with(['comments', 'likes'])->get();
        return view('admin.summary')->with('musics', $musics);
    }

    //
    public function userSummaries(){
        $musics = Upload::with(['comments', 'likes'])->get();
        return view('Visitors.summary')->with('musics', $musics);
    }
}
