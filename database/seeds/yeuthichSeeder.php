<?php

use Illuminate\Database\Seeder;
use App\yeuthichModel;
class yeuthichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('dlct_yeuthich')->insert([
            'dd_iddiadiem' => rand(1,20),
            'nd_idnguoidung' => rand(1,20) 
        ]);
    }
}
