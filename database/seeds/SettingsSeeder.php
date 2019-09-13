<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        	"blog_name" => "cmsproject",
        	"phone_number" => "01023050617",
        	"blog_email" => "amrsaied47@gmail.com",
        	"address" => "Giza-Haram"
        ]);
    }
}
