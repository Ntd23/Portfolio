<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EducationController extends Controller
{
  public function index()
  {
    $edus = Education::all();
    return view('admin.education.index', compact('edus'));
  }
  public function new()
  {
    return view('admin.education.new');
  }
  public function create(Request $request)
  {
    $request->validate([
      'school' => 'required',
      'degree' => 'required',
      'major' => 'required',
      'objective' => 'required',
      'start_at' => 'required|date|before:end_at',
      'end_at' => 'required|date|after:start_at',
    ]);
    $edu = new Education();
    $edu->school = $request->school;
    $edu->degree = $request->degree;
    $edu->major = $request->major;
    $edu->objective = $request->objective;
    $edu->start_at = Carbon::parse($request->start_at)->format('Y-d-m');
    $edu->end_at = Carbon::parse($request->end_at)->format('Y-d-m');
    $edu->save();

    session()->flash('success', 'Added new education successfully.');

    return redirect()->route('admin.edu');
  }
  public function edit($id)
  {
    $edu = Education::findOrFail($id);
    return view('admin.education.edit', compact('edu'));
  }

  public function update(Request $request, $id)
  {
    $edu = Education::findOrFail($id);
    $request->validate([
      'start_at' => 'date|before:end_at',
      'end_at' => 'date|after:start_at',
    ]);
    $edu->start_at = $request->start_at;
    $edu->end_at = $request->end_at;

    $edu->save();

    session()->flash('success', 'Updated new education successfully.');

    return redirect()->route('admin.edu');
  }
  public function delete($id)
  {
    Education::findOrFail($id)->delete();
    return response()->json(['status' => 'Deleted Successfully This Record']);
  }
}
