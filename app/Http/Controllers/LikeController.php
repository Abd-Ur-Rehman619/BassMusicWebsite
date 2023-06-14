<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
class LikeController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'userId' => 'required',
            'musicId' => 'required',
            'Liked' => 'required',
        ]);

        $like = new Like();
        $like->likedBy = $request->userId;
        $like->music_ID = $request->musicId;
        $like->state = $request->Liked;
        $ok = $like->save();
        if($ok){
            return back()->with('success',' You Have Liked the Music!!!');
        }else{
            return back()->with('failed', 'Ooops! Fail to Like.....');
        }
    }

    public function update(Request $request, $id){
        $like = Like::find($id);
        if($like->state=='Liked'){
            $like->state = "NULL";
            $ok = $like->save();
            if($ok){
                return back()->with('success',' You Have UnLiked the Music!!!');
            }else{
                return back()->with('failed', 'Ooops! Fail to UnLike.....');
            }
        }
        if($like->state=='NULL'){
            $like->state = "Liked";
            $ok = $like->save();
            if($ok){
                return back()->with('success',' You Have Liked the Music!!!');
            }else{
                return back()->with('failed', 'Ooops! Fail to Like.....');
            }
        }


    }
}
