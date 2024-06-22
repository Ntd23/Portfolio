<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
  public function index()
  {
    $abouts = About::all();
    return view('admin.about.index', compact('abouts'));
  }
  public function new()
  {
    return view('admin.about.new');
  }
  public function create(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:abouts,email',
      'phone' => 'required|min:10|max:12',
      'address' => 'required',
      'avatar' => 'required|mimes:png,jpg,jpeg,gif|max:2048',
      'github_url' => 'required',
      'linkedin_url' => 'required',
      'facebook_url' => 'required',
    ]);
    $about = new About();

    $about->name = $request->name;
    $about->email = $request->email;
    $about->phone = $request->phone;
    $about->address = $request->address;
    $about->github_url = $request->github_url;
    $about->linkedin_url = $request->linkedin_url;
    $about->facebook_url = $request->facebook_url;

    $avatarPath = $request->file('avatar')->store('images/about', 'public');
    $about->avatar = $avatarPath;

    $about->save();
    session()->flash('success', 'Added new about successfully.');
    return redirect()->route('admin.about');
  }
  public function edit($id)
  {
    $about = About::findOrFail($id);
    return view('admin.about.edit', compact('about'));
  }
  public function update(Request $request, $id)
  {
    $request->validate([
      'email' => 'email|required',
      'phone' => 'min:10|max:12',
      'avatar' => 'mimes:png,jpg,jpeg,gif|max:2048',
    ]);
    $about = About::findOrFail($id);
    $about->name = $request->name;
    $about->email = $request->email;
    $about->phone = $request->phone;
    $about->address = $request->address;
    $about->github_url = $request->github_url;
    $about->linkedin_url = $request->linkedin_url;
    $about->facebook_url = $request->facebook_url;

    $avatarPath = $request->file('avatar')->store('images/about', 'public');
    $about->avatar = $avatarPath;

    $about->save();
    session()->flash('success', 'Updated new about successfully.');
    return redirect()->route('admin.about');
  }
  public function delete($id)
  {
    $about= About::findOrFail($id);
    // dd($about->avatar);
    Storage::disk('public')->delete($about->avatar);
    $about->delete();
    return response()->json(['status' => 'Deleted Successfully This Record']);
  }
}
