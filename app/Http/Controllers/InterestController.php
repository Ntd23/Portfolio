<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function index() {
      $interests= Interest::all();
      return view('admin.interest.index', compact('interests'));
    }
    public function new() {
      return view('admin.interest.new');
    }
    public function create(Request $request) {
      $request->validate([
        'descriptions'=> 'required'
      ]);
      $interest = new Interest();
      $interest->descriptions = $request->descriptions;
      $interest->save();
      session()->flash('success', 'Added new interest successfully.');
      return redirect()->route('admin.interest');
    }
    public function edit($id) {
      $interest= Interest::findOrFail($id);
      return view('admin.interest.edit', compact('interest'));
    }
    public function update(Request $request, $id) {
      $interest= Interest::findOrFail($id);
      $interest->descriptions = $request->descriptions;
      $interest->save();
      session()->flash('success', 'Updated new interest successfully.');
      return redirect()->route('admin.interest');
    }
    public function delete($id) {
      $interest= Interest::findOrFail($id)->delete();
      return response()->json(['status' => 'Deleted Successfully This Record']);
    }
}
