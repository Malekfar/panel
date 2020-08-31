<?php

use Illuminate\Database\Seeder;

class Panel_MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstMenu = \Illuminate\Support\Facades\DB::table('admin_menus')->insertGetId([
            'name' => 'عملیات های سامانه'
        ]);
        \Illuminate\Support\Facades\DB::table('admin_menu_items')->insert([
            'label' => 'مدیریت منوها',
            'link'  => '/panel/menus',
            'menu'  => $firstMenu,
            'icon'  => 'fa-bars',
            'class' => null,
            'parent'=> 0,
            'depth' => 0,
            'sort'  => 0,
        ]);
        $users = \Illuminate\Support\Facades\DB::table('admin_menu_items')->insertGetId([
            'link'  => '/panel/users',
            'label' => 'مدیریت کاربران',
            'menu'  => $firstMenu,
            'icon'  => 'fa-users',
            'class' => null,
            'parent'=> 0,
            'depth' => 0,
            'sort'  => 0,
        ]);
        \Illuminate\Support\Facades\DB::table('admin_menu_items')->insertGetId([
            'link' => '/panel/users',
            'label' => 'لیست کاربران',
            'menu' => $firstMenu,
            'icon' => 'fa-users',
            'class' => null,
            'parent' => $users,
            'depth' => 0,
            'sort' => 0,
        ]);
        \Illuminate\Support\Facades\DB::table('admin_menu_items')->insertGetId([
            'link'  => '/panel/managers',
            'label' => 'مدیران',
            'menu'  => $firstMenu,
            'icon'  => 'fa-cogs',
            'class' => null,
            'parent'=> $users,
            'depth' => 0,
            'sort'  => 1,
        ]);
        \Illuminate\Support\Facades\DB::table('admin_menu_items')->insertGetId([
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
