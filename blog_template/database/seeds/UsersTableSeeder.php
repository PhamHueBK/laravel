<?php

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Pham Hue',
	        'email' => 'hue.pham@quant-edge.com',
	        'password' => bcrypt('123456'), // secret
	        'permission' => 2,
	        'avatar' => $faker->imageUrl($width = 640, $height = 480),
	        'address' => 'Nam Định',
	        'mobile' => '01278080007',
	        'birthday' => '1997-03-13',
        ]);

    }
}
