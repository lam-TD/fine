<?php

use Illuminate\Database\Seeder;
use App\nguoidungModel;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $this->call([
	        // nguoidungSeeder::class,
	        //diadiemSeeder::class,
	        //binhluanSeeder::class,
	    	//dichvuSeeder::class,
	    	//danhgiaSeeder::class
            // loaihinhsukienSeeder::class
            UsersTableSeeder::class
    	]);
    }
}
