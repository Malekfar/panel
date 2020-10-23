<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Panel_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'level'     => "0",
            'picture'   => "/admin/img/users/group-default.jpg",
            'name'      => "admin",
            'email'     => "admin@gmail.com",
            'password'  => bcrypt(123456)
        ]);
    }
}
