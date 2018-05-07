<?php

use Illuminate\Database\Seeder;
use App\binhluanModel;
class binhluanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlct_binhluan')->insert([
            'bl_binhluan' => str_random(10),
            'bl_trangthai' => rand(0,1),
  	        'dv_iddichvu' =>rand(1,20),
  	        'nd_idnguoidung' =>rand(1,20)
        ]);
    }
}
