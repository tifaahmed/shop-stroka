<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create( [
            'item_key' => 'logo',
            'item' => 'admin@admin.com',
        ]);
        SiteSetting::create( [
            'item_key' => 'site_domain',
            'item' => 'https://smart.lic2.com/',
        ]);
        SiteSetting::create( [
            'item_key' => 'sit_name_en',
            'item' => 'smart pay',
        ]);
        SiteSetting::create( [
            'item_key' => 'sit_name_ar',
            'item' => 'ادفع بذكاء',
        ]);
    }
}
