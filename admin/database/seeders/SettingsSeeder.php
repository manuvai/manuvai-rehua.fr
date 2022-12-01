<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'key' => 'introduction_text',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'hero_image_path',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'cv_file_path',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'linkedin_badge',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'mobile',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'email',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'captcha_pub_key',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'captcha_prv_key',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'linkedin_access_token',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'linkedin_access_token',
            'value' => '',
        ]);
        DB::table('settings')->insert([
            'key' => 'linkedin_publish_interval_days',
            'value' => '',
        ]);
    }
}
