<?php

use Illuminate\Database\Seeder;
use App\loaihinhsukienModel;
class loaihinhsukienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlct_loaihinhsukien')->insert([
            'lhsk_ten' => str_random(10)
        ]);
    }
}
