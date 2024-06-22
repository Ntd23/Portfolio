<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index() {
      $skills= Skill::all();
      return view('admin.skill.index', compact('skills'));
    }
    public function new() {
      return view('admin.skill.new');
    }
    public function create(Request $request) {
      $skill = new Skill();
      $skill->languages_tools = $request->languages_tools;
      $skill->databases = $request->databases;

      $skill->save();
      session()->flash('success','Added skill successfully.');
      return redirect()->route('admin.skill');
    }
    public function edit($id) {
      $skill= Skill::findOrFail($id);
      return view('admin.skill.edit', compact('skill'));
    }
    public function update(Request $request, $id) {
      $skill= Skill::findOrFail($id);
      $skill->languages_tools = $request->languages_tools;
      $skill->databases = $request->databases;
      $skill->save();
      session()->flash('success','Updated project successfully.');
      return redirect()->route('admin.skill');
    }
    public function delete($id) {
      $skill= Skill::findOrFail($id);
      $skill->delete();
      return response()->json(['status'=> 'Deleted Successfully This Record']);
    }
}
