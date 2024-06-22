<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
  public function index()
  {
    $projects = Project::all();
    return view('admin.project.index', compact('projects'));
  }
  public function new()
  {
    return view('admin.project.new');
  }
  public function create(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'image' => 'required|max:2048|mimes:png,jpg,jpeg,gif',
      'url' => 'required|url',
      'descriptions' => 'required'
    ]);
    $project= new Project();
    $project->title = $request->title;
    $project->url = $request->url;
    $project->descriptions = $request->descriptions;

    $image= $request->file('image')->store('images/project', 'public');
    $project->image = $image;

    $project->save();
    session()->flash('success', 'Added new project successfully.');
    return redirect()->route('admin.project');
  }
  public function edit($id) {
    $project= Project::findOrFail($id);
    return view('admin.project.edit', compact('project'));
  }
  public function update(Request $request, $id) {
    $request->validate([
      'image' => 'max:2048|mimes:png,jpg,jpeg,gif',
    ]);
    $project= Project::findOrFail($id);
    $project->title = $request->title;
    $project->url = $request->url;
    $project->descriptions= $request->descriptions;

    $image= $request->file('image')->store('images/project', 'public');
    $project->image= $image;

    $project->save();
    session()->flash('success', 'Updated project successfully.');

    return redirect()->route('admin.project');
  }
  public function delete($id) {
    $project= Project::findOrFail($id);
    Storage::disk('public')->delete($project->image);
    $project->delete();

    return response()->json(['status'=> 'Deleted Successfully This Record']);
  }
}
