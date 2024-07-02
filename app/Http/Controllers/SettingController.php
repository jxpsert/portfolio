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
        return view('pages.admin.settings.index', [
            'settings' => Setting::all()
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
