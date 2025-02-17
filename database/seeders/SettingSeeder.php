<?php

namespace Database\Seeders;

use App\Models\Setting;

class SettingSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'site_name',
            'value' => 'Jasper Platenburg',
        ]);

        Setting::create([
            'key' => 'title',
            'value' => 'Student Software Developer',
        ]);

        Setting::create([
            'key' => 'location',
            'value' => 'Nijmegen, NL',
        ]);

        Setting::create([
            'key' => 'email',
            'value' => 'jasper@ptdk.nl',
        ]);

        Setting::create([
            'key' => 'phone',
            'value' => '+31 6 23 34 80 23',
        ]);

        Setting::create([
            'key' => 'github',
            'value' => 'https://github.com/jxpsert',
        ]);

        Setting::create([
            'key' => 'linkedin',
            'value' => 'https://linkedin.com/in/jasper-platenburg',
        ]);

        Setting:create([
            'key' => 'frontend_theme',
            'value' => 'alpha',
        ]);
    }
}