<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        $settings = Setting::all()->pluck('value', 'key')->toArray();;
        return view('panel/settings/setting',compact('user','settings'));
    }
    public function update(Request $request)
    {
        $data = $request->only(['site_name', 'site_url']);
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
