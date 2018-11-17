<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('manufacturers')->insert([
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'phone' => str_random(10),
        ]);
    }
}
