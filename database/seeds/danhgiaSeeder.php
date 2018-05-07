<?php

use Illuminate\Database\Seeder;
use App\danhgiaModel;
class danhgiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlct_danhgia')->insert([
            'dg_diem' => rand(1,5),
  	        'dv_iddichvu' =>rand(1,20),
  	        'nd_idnguoidung' =>rand(1,20)
        ]);
    }
}
