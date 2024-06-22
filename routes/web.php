<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'portfolio']);

Auth::routes();
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::fallback(function () {
  return redirect('/');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['admin'])->group(function () {
  Route::get('/', function () {
    return view('admin.app');
  })->name('admin');

  //about
  Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('admin.about');
    Route::get('new', [AboutController::class, 'new'])->name('admin.about.new');
    Route::post('create', [AboutController::class, 'create'])->name('admin.about.create');
    Route::get('edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::post('update/{id}', [AboutController::class, 'update'])->name('admin.about.update');
    Route::delete('delete/{id}', [AboutController::class, 'delete'])->name('admin.about.delete');
  });

  //education
  Route::prefix('education')->group(function() {
    Route::get('/', [EducationController::class, 'index'])->name('admin.edu');
    Route::get('new', [EducationController::class, 'new'])->name('admin.edu.new');
    Route::post('create', [EducationController::class, 'create'])->name('admin.edu.create');
    Route::get('edit/{id}', [EducationController::class, 'edit'])->name('admin.edu.edit');
    Route::post('update/{id}', [EducationController::class, 'update'])->name('admin.edu.update');
    Route::delete('delete/{id}', [EducationController::class, 'delete'])->name('admin.edu.delete');
  });

  //education
  Route::prefix('project')->group(function() {
    Route::get('/', [ProjectController::class, 'index'])->name('admin.project');
    Route::get('new', [ProjectController::class, 'new'])->name('admin.project.new');
    Route::post('create', [ProjectController::class, 'create'])->name('admin.project.create');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
    Route::post('update/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
    Route::delete('delete/{id}', [ProjectController::class, 'delete'])->name('admin.project.delete');
  });

  //skill
  Route::prefix('skill')->group(function() {
    Route::get('/', [SkillController::class, 'index'])->name('admin.skill');
    Route::get('new', [SkillController::class, 'new'])->name('admin.skill.new');
    Route::post('create', [SkillController::class, 'create'])->name('admin.skill.create');
    Route::get('edit/{id}', [SkillController::class, 'edit'])->name('admin.skill.edit');
    Route::post('update/{id}', [SkillController::class, 'update'])->name('admin.skill.update');
    Route::delete('delete/{id}', [SkillController::class, 'delete'])->name('admin.skill.delete');
  });

  //interest
  Route::prefix('interest')->group(function() {
    Route::get('/', [InterestController::class, 'index'])->name('admin.interest');
    Route::get('new', [InterestController::class, 'new'])->name('admin.interest.new');
    Route::post('create', [InterestController::class, 'create'])->name('admin.interest.create');
    Route::get('edit/{id}', [InterestController::class, 'edit'])->name('admin.interest.edit');
    Route::post('update/{id}', [InterestController::class, 'update'])->name('admin.interest.update');
    Route::delete('delete/{id}', [InterestController::class, 'delete'])->name('admin.interest.delete');
  });
});
