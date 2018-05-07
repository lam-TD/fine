<?php

use Illuminate\Database\Seeder;
use App\dichvuModel;
class dichvuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlct_dichvu')->insert([
            'dv_gioithieu' => str_random(10),
            'dv_giomocua' =>'8h:00',
            'dv_giodongcua'=>'22h00',
            'dv_giacaonhat'=> 2147483647,
            'dv_giathapnhat'=>0,
            'dv_trangthai'=> rand(0,1),
            'dd_iddiadiem'=>rand(1,20)
        ]);
    }
}
