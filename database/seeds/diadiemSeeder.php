<?php

use Illuminate\Database\Seeder;
use App\diadiemModel;
class diadiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlct_diadiem')->insert([
            'dd_tendiadiem' => str_random(10),
            'dd_gioithieu' => str_random(10),
  	        'dd_sodienthoai' =>1234567789,
            'dn_diachi' => str_random(10),
            'dd_kinhdo' => 123918231,
            'dd_vido' => 123918231,
            'nd_idnguoidung' => rand(1,20)
        ]);
    }
}
