<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CursusController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Resources\CursusCollection;
use App\Http\Resources\CursusResource;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SettingCollection;
use App\Http\Resources\SettingsResource;
use App\Http\Resources\SkillCollection;
use App\Http\Resources\SkillResource;
use App\Models\Cursus;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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
Route::get('/linkedin-scheduler/{accessToken}', [App\Http\Controllers\LinkedinScheduler::class, 'index']);

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/linkedin-posts', [App\Http\Controllers\LinkedinPostController::class, 'index'])->name('linkedin-posts.list');
    Route::get('/linkedin-posts/create', [App\Http\Controllers\LinkedinPostController::class, 'create'])->name('linkedin-posts.create');
    Route::post('/linkedin-posts/store', [App\Http\Controllers\LinkedinPostController::class, 'store'])->name('linkedin-posts.store');
    Route::post('/linkedin-posts/destroy/{linkedinPost}', [App\Http\Controllers\LinkedinPostController::class, 'destroy'])->name('linkedin-posts.destroy');

    Route::get('/linkedin-posts/edit/{linkedinPost}', [App\Http\Controllers\LinkedinPostController::class, 'edit'])->name('linkedin-posts.edit');
    Route::post('/linkedin-posts/update/{linkedinPost}', [App\Http\Controllers\LinkedinPostController::class, 'update'])->name('linkedin-posts.update');
    
    Route::post('/linkedin-posts/media/store', [App\Http\Controllers\LinkedinPostController::class, 'storeMedia'])->name('linkedin-posts.media.store');
    Route::post('/linkedin-posts/media/destroy/{linkedinMediaPost}', [App\Http\Controllers\LinkedinPostController::class, 'destroyMedia'])->name('linkedin-posts.media.destroy');


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

    Route::get('/cursuses', [CursusController::class, 'index'])->name('cursuses.list');
    Route::get('/cursuses/create', [CursusController::class, 'create'])->name('cursuses.create');
    Route::post('/cursuses/store', [CursusController::class, 'store'])->name('cursuses.store');
    Route::post('/cursuses/destroy/{cursus}', [CursusController::class, 'destroy'])->name('cursuses.destroy');

    Route::get('/cursuses/edit/{cursus}', [CursusController::class, 'edit'])->name('cursuses.edit');
    Route::post('/cursuses/update/{cursus}', [CursusController::class, 'update'])->name('cursuses.update');

});

Route::prefix('api')->group(function() {
    Route::get('/settings', function() {
        return json_encode(Setting::initData());
    });
    Route::get('/skills', function() {
        return new SkillCollection(Skill::all());
    });
    Route::get('/skills/{id}', function($id) {
        return new SkillResource(Skill::findOrFail($id));
    });
    Route::get('/projects', function() {
        return new ProjectCollection(Project::all());
    });
    Route::get('/projects/{id}', function($id) {
        return new ProjectResource(Project::findOrFail($id));
    });
    Route::get('/cursuses', function() {
        return new CursusCollection(Cursus::all());
    });
    Route::get('/cursuses/{id}', function($id) {
        return new CursusResource(Cursus::findOrFail($id));
    });
    Route::post('/contact', [ContactController::class, 'mail']);
});
