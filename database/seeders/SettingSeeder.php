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
            'type' => 'text',
            'value' => 'Jasper Platenburg',
        ]);

        Setting::create([
            'key' => 'title',
            'type' => 'text',
            'value' => 'Student Software Developer',
        ]);

        Setting::create([
            'key' => 'location',
            'type' => 'text',
            'value' => 'Nijmegen, NL',
        ]);

        Setting::create([
            'key' => 'email',
            'type' => 'text',
            'value' => 'jasper@ptdk.nl',
        ]);

        Setting::create([
            'key' => 'phone',
            'type' => 'text',
            'value' => '+31 6 23 34 80 23',
        ]);

        Setting::create([
            'key' => 'github',
            'type' => 'text',
            'value' => 'https://github.com/jxpsert',
        ]);

        Setting::create([
            'key' => 'linkedin',
            'type' => 'text',
            'value' => 'https://linkedin.com/in/jasper-platenburg',
        ]);

        Setting:create([
            'key' => 'frontend_theme',
            'type' => 'text',
            'value' => 'alpha',
        ]);
    }
}