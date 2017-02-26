<?php

use Illuminate\Database\Seeder;

use App\ZonGaji;

class ZongajiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		ZonGaji::create(['id' => '1','kod' => '01','nama' => 'BAHAGIAN KHIDMAT PENGURUSAN']);
		ZonGaji::create(['id' => '2','kod' => '02','nama' => 'BAHAGIAN INDUSTRI PADI']);
		ZonGaji::create(['id' => '3','kod' => '03','nama' => 'BAHAGIAN INDUSTRI PADI DAN BUKAN PADI']);
		ZonGaji::create(['id' => '4','kod' => '04','nama' => 'BAHAGIAN PENGURUSAN INSTITUSI LADANG']);
		ZonGaji::create(['id' => '5','kod' => '05','nama' => 'BAHAGIAN PERANCANGAN DAN TEKNOLOGI MAKLUMAT']);
		ZonGaji::create(['id' => '6','kod' => '06','nama' => 'BAHAGIAN PENGURUSAN EMPANGAN DAN SUMBER AIR']);
		ZonGaji::create(['id' => '7','kod' => '07','nama' => 'BAHAGIAN PENGAIRAN DAN SALIRAN']);
		ZonGaji::create(['id' => '8','kod' => '08','nama' => 'BAHAGIAN KHIDMAT MEKANIKAL DAN INFRASTRUKTUR']);
		ZonGaji::create(['id' => '9','kod' => '09','nama' => 'PERKHIDMATAN MEKANIKAL']);
		ZonGaji::create(['id' => '10','kod' => '10','nama' => 'BAHAGIAN PENGURUSAN WILAYAH']);
		ZonGaji::create(['id' => '11','kod' => '11','nama' => 'WILAYAH 1']);
		ZonGaji::create(['id' => '12','kod' => '12','nama' => 'WILAYAH 2']);
		ZonGaji::create(['id' => '13','kod' => '13','nama' => 'WILAYAH 3']);
		ZonGaji::create(['id' => '14','kod' => '14','nama' => 'WILAYAH 4']);
		ZonGaji::create(['id' => '15','kod' => '20','nama' => 'BAYARAN SENDIRI']);

        
    }
}
