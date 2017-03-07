<?php

use Illuminate\Database\Seeder;

use App\Perkhidmatan;

class PerkhidmatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perkhidmatan::create([
        	'kod'	=> 'pwt',
        	'nama'	=> strtoupper('Pinjaman Wang Tunai')
    	]);

    	Perkhidmatan::create([
        	'kod'	=> 'bukusekolah',
        	'nama'	=> strtoupper('Pinjaman Buku Sekolah')
    	]);

    	Perkhidmatan::create([
        	'kod'	=> 'kecemasan',
        	'nama'	=> strtoupper('Pinjaman Kecemasan')
    	]);

    	Perkhidmatan::create([
        	'kod'	=> 'tayarbateri',
        	'nama'	=> strtoupper('Pinjaman Tayar Bateri')
    	]);

    	Perkhidmatan::create([
        	'kod'	=> 'roadtax',
        	'nama'	=> strtoupper('Pinjaman Cukai Jalan')
    	]);

    	Perkhidmatan::create([
        	'kod'	=> 'insurans',
        	'nama'	=> strtoupper('Pinjaman Insurans')
    	]);

    	Perkhidmatan::create([
        	'kod'	=> 'pertaruhan',
        	'nama'	=> strtoupper('Pertaruhan')
    	]);











    }
}
