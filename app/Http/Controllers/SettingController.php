<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        $settings = $settings->filter(function ($setting) {
            return $setting->key !== 'frontend_theme';
        });

        return view('pages.admin.settings.index', [
            'settings' => $settings
        ]);
    }

    public function set()
    {
        $settings = request()->all();
        foreach ($settings as $key => $value) {
            try {
            $setting = Setting::where('key', $key)->update(['value' => $value ?? '']);
            } catch (\Exception $e) {
                // Ignore key
            }
        }

        if(request()->hasFile('photo')) {
            $logo = request()->file('photo');
            $logo->storeAs('public/assets', 'photo.png');
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }
}