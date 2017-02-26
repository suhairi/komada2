<?php

use Illuminate\Database\Seeder;

use App\Tka;

class TkaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tka::create([
        	'jumlah' 	=> 6.00,
        	'status'	=> 1
    	]);
    }
}
