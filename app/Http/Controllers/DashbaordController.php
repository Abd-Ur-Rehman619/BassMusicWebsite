<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;

class DashbaordController extends Controller
{
    //
    public function userDashboard(){
        $creators = User::where('User_type','Creator')->get();
        $visitors = User::where('User_type','Normal-User')->get();
        $musics = Upload::all();
        return view('Visitors.dashboard')->with(['creators'=> $creators, 'visitors'=> $visitors,'musics'=> $musics ]);
    }

    public function creatorDashboard(){
        $creators = User::where('User_type','Creator')->get();
        $visitors = User::where('User_type','Normal-User')->get();
        $musics = Upload::all();
        return view('Creator.dashboard')->with(['creators'=> $creators, 'visitors'=> $visitors,'musics'=> $musics ]);
    }

    public function adminDashboard(){
        $creators = User::where('User_type','Creator')->get();
        $visitors = User::where('User_type','Normal-User')->get();
        $musics = Upload::all();
        return view('admin.dashboard')->with(['creators'=> $creators, 'visitors'=> $visitors,'musics'=> $musics ]);
    }
}
