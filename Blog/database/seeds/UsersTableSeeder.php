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
        //
        DB::table('users')->insert([
            'name' => 'Pham Hue',
            'avatar' => 'https://uphinhnhanh.com/image/i4BUSa',
            'address' => 'Nam Định',
            'mobile' => '01278080007',
            'birthday' => '1997-03-13',
            'email' => 'phamhue97@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
