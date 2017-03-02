<?php

namespace App\settings2;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $connection 	= 'mysql2';
    protected $table 		= 'profile';
    protected $id 			= 'id';
    protected $fillable 	= ['no_gaji', 'no_anggota', 'jumlah_yuran_bulanan', 'jumlah_pertaruhan', 'nama', 'nokp', 'jantina_id', 'bangsa', 'agama', 'email', 'alamat1', 'alamat2', 'tarikh_khidmat', 'tarikh_ahli', 'jawatan', 'taraf_jawatan', 'zon_gaji_id', 'profile_kategori_id', 'status'];
    
}
