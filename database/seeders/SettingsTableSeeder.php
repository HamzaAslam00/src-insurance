<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();

        $settings = [
            ['group' => 'general', 'key' => 'admin_site_favicon', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'admin_site_title', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'admin_site_header_logo', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'admin_site_sidebar_icon', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'admin_site_footer_link', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'admin_site_theme_color', 'value' => '', 'status' => 1],
            
            ['group' => 'general', 'key' => 'main_site_favicon', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_link', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_title', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_header_logo', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_cover_image', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_footer_logo', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_footer_description', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_color', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_contact_no', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_contact_email', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_facebook_link', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_instagram_link', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_twitter_link', 'value' => '', 'status' => 1],
            ['group' => 'general', 'key' => 'main_site_linkedin_link', 'value' => '', 'status' => 1],
        ];

        Setting::insert($settings);
    }
}
