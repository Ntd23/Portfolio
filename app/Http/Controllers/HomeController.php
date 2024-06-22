<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Interest;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function portfolio() {
      $about= About::first();
      $edu= Education::first();
      $languages_tools= Skill::pluck('languages_tools')->all();
      $databases= Skill::pluck('databases')->all();
      $interest= Interest::first();
      $projects= Project::all();
      return view('welcome', compact('about', 'edu', 'languages_tools','databases', 'interest', 'projects'));
    }
}
