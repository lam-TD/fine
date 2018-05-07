<?php

use Illuminate\Database\Seeder;
use App\nguoidungModel;
class nguoidungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dlct_nguoidung')->insert([
            'nd_tendangnhap' => 'lamthemen',
            'nd_email_id' => str_random(10).'@gmail.com',
            'nd_facebook_id' => str_random(10).'@gmail.com',
            'nd_matkhau' => bcrypt('123456'),
            'nd_quocgia' => str_random(10),
            'nd_avatar' => str_random(10),
            'nd_ngonngu' => str_random(10), 
        ]);
    }
}
