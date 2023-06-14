<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Event;
use App\Models\News;
use App\Models\Category;
class HomeController extends Controller
{
    //
    public function index(){
        $title = 'Home';
        $musics = Upload::all();
        $events = Event::all();
        $categories = Category::all();
        return view('index')->with(['title'=> $title, 'musics'=> $musics,
                                     'events'=> $events, 'categories'=> $categories]);
    }

    public function Albums(){
        $title = 'Latest Albums';
        $musics = Upload::all();
        return view('albums')->with(['title'=> $title, 'musics'=> $musics]);
    }

    public function Events(){
        $title = 'Latest Events';
        $events = Event::all();
        return view('events')->with(['title'=> $title, 'events'=> $events]);
    }

    public function News(){
        $news = News::with('user')->get();
        $categories = Category::all();
        $title = 'Latest News';
        return view('news')->with(['title'=> $title, 'news'=> $news, 'categories'=> $categories]);
    }

    public function contactUs(){
        $title = 'Contact us';
        return view('contact')->with('title', $title);
    }

    public function Login(){
        $title = 'Sign In';
        return view('login')->with('title', $title);
    }

    public function Registration(){
        $title = 'Sign Up';
        return view('register')->with('title', $title);
    }
}
