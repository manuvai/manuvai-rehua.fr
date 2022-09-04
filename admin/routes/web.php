<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings');
Route::post('/settings', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.edit');

Route::get('/skills', [SkillController::class, 'index'])->name('skills.list');
Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');
Route::post('/skills/store', [SkillController::class, 'store'])->name('skills.store');
Route::post('/skills/destroy/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

Route::get('/skills/edit/{skill}', [SkillController::class, 'edit'])->name('skills.edit');
Route::post('/skills/update/{skill}', [SkillController::class, 'update'])->name('skills.update');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.list');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::post('/projects/destroy/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/projects/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/projects/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
