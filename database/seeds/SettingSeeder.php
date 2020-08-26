<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'sitename_ar' => 'اون لاين شوب',
            'sitename_en' => 'Ecommerce',

        ]);
    }
}
