<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Panel_MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstMenu = DB::table('admin_menus')->insertGetId([
            'name' => 'عملیات های سامانه'
        ]);
        DB::table('admin_menu_items')->insert([
            'label' => 'مدیریت منوها',
            'link'  => '/panel/menus',
            'menu'  => $firstMenu,
            'icon'  => 'fa-bars',
            'class' => null,
            'parent'=> 0,
            'depth' => 0,
            'sort'  => 0,
        ]);
        $users = DB::table('admin_menu_items')->insertGetId([
            'link'  => '/panel/users',
            'label' => 'مدیریت کاربران',
            'menu'  => $firstMenu,
            'icon'  => 'fa-users',
            'class' => null,
            'parent'=> 0,
            'depth' => 0,
            'sort'  => 0,
        ]);
        DB::table('admin_menu_items')->insertGetId([
            'link' => '/panel/users',
            'label' => 'لیست کاربران',
            'menu' => $firstMenu,
            'icon' => 'fa-users',
            'class' => null,
            'parent' => $users,
            'depth' => 0,
            'sort' => 0,
        ]);
        DB::table('admin_menu_items')->insertGetId([
            'link'  => '/panel/managers',
            'label' => 'مدیران',
            'menu'  => $firstMenu,
            'icon'  => 'fa-cogs',
            'class' => null,
            'parent'=> $users,
            'depth' => 0,
            'sort'  => 1,
        ]);
        DB::table('admin_menu_items')->insertGetId([
            'link' => '/panel/roles',
            'label' => 'نقش ها',
            'menu' => $firstMenu,
            'icon' => 'fa-user-secret',
            'class' => null,
            'parent' => $users,
            'depth' => 0,
            'sort' => 2,
        ]);
    }
}
