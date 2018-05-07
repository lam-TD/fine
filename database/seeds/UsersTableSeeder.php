<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vnt_users')->insert([
            [
                'username' => "phanvantinh",
                'user_facebook_id' => str_random(10).'@facebook.com',
                'user_email_id' => str_random(10).'@facebook.com',
                'user_avatar' => str_random(10).'png',
                'user_country' => str_random(10),
                'user_language'=> str_random(10),
                'user_status' => "active",
                'user_groups_id' => 1,
                'password' => bcrypt('123456'),
           
            ],
            [
                'username' => "nguyendongtuong",
                'user_facebook_id' => str_random(10).'@facebook.com',
                'user_email_id' => str_random(10).'@facebook.com',
                'user_avatar' => str_random(10).'png',
                'user_country' => str_random(10),
                'user_language'=> str_random(10),
                'user_status' => "active",
                'user_groups_id' => 1,
                'password' => bcrypt('123456'),
               
            ],
            [
                'username' => "thaingochuy",
                'user_facebook_id' => str_random(10).'@facebook.com',
                'user_email_id' => str_random(10).'@facebook.com',
                'user_avatar' => str_random(10).'png',
                'user_country' => str_random(10),
                'user_language'=> str_random(10),
                'user_status' => "active",
                'user_groups_id' => 1,
                'password' => bcrypt('123456'),
                
            ],
            [
                'username' => "tranduclam",
                'user_facebook_id' => str_random(10).'@facebook.com',
                'user_email_id' => str_random(10).'@facebook.com',
                'user_avatar' => str_random(10).'png',
                'user_country' => str_random(10),
                'user_language'=> str_random(10),
                'user_status' => "active",
                'user_groups_id' => 1,
                'password' => bcrypt('123456'),
               
            ],
            [
                'username' => "vophantrongnghia",
                'user_facebook_id' => str_random(10).'@facebook.com',
                'user_email_id' => str_random(10).'@facebook.com',
                'user_avatar' => str_random(10).'png',
                'user_country' => str_random(10),
                'user_language'=> str_random(10),
                'user_status' => "active",
                'user_groups_id' => 1,
                'password' => bcrypt('123456'),
                
            ],

        ]);
    }
}
