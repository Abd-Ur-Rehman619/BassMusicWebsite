<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Message;
class MessageController extends Controller
{
    //
    public function index(){
        $messages = Message::all();
        return view('Admin.messages')->with('messages', $messages);
    }
    public function SendMessage(Request $request){
        $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u|min:3',
            'email' => 'required|email',
            'Phone' => 'required|numeric|digits:11|regex:/^((0)?)(3)([0-9]{9})$/',
            'subject' => 'required|min:3',
            'message' => 'required|min:3',
        ],
        [
            'name.regax' => 'Only Alphabets are allowed',
        ]);

        $msg = new Message;
        $msg->Name=$request->name;
        $msg->Email=$request->email;
        $msg->Phone=$request->Phone;
        $msg->Subject=$request->subject;
        $msg->Message=$request->message;
        $ok = $msg->save();
        if($ok){
            return back()->with('success','Success! Message Send successfully');
        }else{
            return back()->with('error', 'Fail to Send Message');
        }
    }

    function destroy($id){
       $msg = Message::find($id);
        $ok = $msg->delete();
        if($ok){
            return back()->with('success',' Deleted successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Deleted');
        }
    }
}
