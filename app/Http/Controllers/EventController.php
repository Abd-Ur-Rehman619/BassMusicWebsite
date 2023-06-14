<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use File;
use Auth;
class EventController extends Controller
{
    public function index(){
        // return $users = Event::find(2)->user;
        // return $events = User::find(2)->events;
        $events = Event::with('user')->get();
        return view('admin.Events')->with('events', $events);
    }

    function create(){
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.addEvent')->with('users', $users);
    }

    function addEvent(){
        return view('Creator.addEvent');
    }

     public function events(){
        $id = Auth::user()->id;
        $events = Event::where('userID',$id)->with('user')->get();
        return view('Creator.Events')->with('events', $events);
    }
    function editEvent($id){
        $event = Event::find($id);
        return view('Creator.updateEvent')->with('event_data', $event);
    }

    function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'location' => 'required|min:3',
            'hosted_by' => 'required',
            'description' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $event = new Event();
        $event->Event_Title = $request->title;
        $event->Event_Description = $request->description;
        $event->Event_Date = $request->date;
        $event->location = $request->location;
        $event->userID = $request->hosted_by;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('Admin/Event Images'), $imageName);
        $event->event_image = $imageName;

        $ok = $event->save();
        if($ok){
            return back()->with('success',' Event is successfully Added!!!');
        }else{
            return back()->with('failed', 'Fail to Added event');
        }

    }

    function show($id){
        return "ok";
    }

    function edit($id){
        $event = Event::find($id);
        $users = User::where('User_type','Creator')->where('status','active')->get();
        return view('admin.updateEvent')->with(['event_data'=> $event, 'users'=> $users]);
    }

    function update(Request $request, $id){
        $event = Event::find($id);
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'location' => 'required|min:3',
            'hosted_by' => 'required',
            'description' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $event->Event_Title = $request->title;
        $event->Event_Description = $request->description;
        $event->Event_Date = $request->date;
        $event->location = $request->location;
        $event->userID = $request->hosted_by;

        if($request->hasFile('image')){
            // Get Image Path from Folder
            $path = 'Admin/Event Images/'. $event->event_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('Admin/Event Images'), $imageName);
            $event->event_image = $imageName;

        }
        $ok = $event->save();
        if($ok){
            return back()->with('success',' Event is successfully Updated!!!');
        }else{
            return back()->with('failed', 'Fail to Update event');
        }

    }

    function destroy($id){
       $event = Event::find($id);
    //    $path = 'Admin/Event Images/'. $event->event_image;
    //         if(File::exists($path))
    //         {
    //             File::delete($path);
    //         }
        $ok = $event->delete();
        if($ok){
            return back()->with('success',' Deleted successfully !!!');
        }else{
            return back()->with('failed', 'Fail to Deleted');
        }
    }

    // User Functions
    public function userEvents(){
        $events = Event::with('user')->get();
        return view('Visitors.Events')->with('events', $events);
    }

}
