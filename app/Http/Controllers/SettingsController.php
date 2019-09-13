<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
	public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
    	$settings = Setting::first();

    	return view("settings.settings", [
    		"settings" => $settings
    	]);
    }

    public function update(Request $request)
    {
    	$validatedData = $request->validate([
            'blog_name' => 'required|min:4',
            'phone_number' => 'required|numeric',
            'blog_email' => 'required|email',
            'address' => "required"
        ]);

        $setting = Setting::first();

        $setting->update($validatedData);

        return redirect()->back();
    }
}
