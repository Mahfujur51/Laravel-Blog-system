<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Setting::create([

        'site_name'=>'Laravel Blog',
        'contact_address'=>'Mujibnagar,Meherpur,Dhaka,Bangladesh',
        'contact_number'=>'+8801925555115',
        'contact_email'=>'mahfujurmoon5@gmail.com'

       ]);

    }
}
