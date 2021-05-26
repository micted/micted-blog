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
        \App\Setting::create([

            'site_name'=> "micted blog",
            'address' => 'Addis Ababa, Ethiopia',
            'contact_number'=> '+251975700028',
            'contact_email'=> 'micted94@gmail.com'
        ]);
    }
}
