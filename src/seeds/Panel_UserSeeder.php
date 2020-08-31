<?php

use Illuminate\Database\Seeder;

class Panel_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'level'     => "0",
            'picture'   => "/admin/img/users/group-default.jpg",
            'name'      => "admin",
            'email'     => "admin@gmail.com",
            'password'  => bcrypt(123456)
        ]);
    }
}
