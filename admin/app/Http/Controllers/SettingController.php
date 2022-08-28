<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('settings');

    }

    private static function storeFile($req, $key, $fileName) {
        $filePath = $req->file($key)->storeAs('uploads', $fileName, 'public');
        return $filePath;
    }

    public function update(Request $req) {
        $req->validate([
            'cv_file_path' => 'nullable|mimes:pdf,xlx,csv|max:2048',
            'hero_image_path' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);
        foreach ($req->except(['_token']) as $key => $value) {
            Setting::where('key', $key)
                ->update(['value' => $value ?: '']);
        }


        if ($req->file('cv_file_path')) {
            $filePath = self::storeFile($req, 'cv_file_path', 'CV.pdf');
            Setting::where('key', 'cv_file_path')
                ->update(['value' => $filePath ?: '']);
        }
        if ($req->file('hero_image_path')) {
            $filePath = self::storeFile($req, 'hero_image_path', 'hero.png');
            Setting::where('key', 'hero_image_path')
                ->update(['value' => $filePath ?: '']);
        }

        return redirect(route('settings'));
    }
}
