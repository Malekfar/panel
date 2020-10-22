<?php

use Illuminate\Database\Seeder;

class Panel_PermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->insert([
            [
                'name'           => "GET-/panel",
                'display_name'   => "داشبورد",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/menus",
                'display_name'   => "مدیریت منوها",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/roles",
                'display_name'   => "مدیریت نقش ها",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/roles/create",
                'display_name'   => "فرم ایجاد نقش",
                'guard_name'     => "web",
            ],[
                'name'           => "POST-/panel/roles",
                'display_name'   => "ایجاد نقش",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/roles/{role}",
                'display_name'   => "نمایش نقش",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/roles/{role}/edit",
                'display_name'   => "فرم ویرایش نقش",
                'guard_name'     => "web",
            ],[
                'name'           => "PUT-/panel/roles/{role}",
                'display_name'   => "ویرایش نقش",
                'guard_name'     => "web",
            ],[
                'name'           => "DELETE-/panel/roles/{role}",
                'display_name'   => "حذف نقش",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/managers",
                'display_name'   => "لیست مدیران",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/users/{user}/permissions",
                'display_name'   => "فرم دسترسی مدیران",
                'guard_name'     => "web",
            ],[
                'name'           => "POST-/panel/users/{user}/permissions",
                'display_name'   => "دسترسی مدیران",
                'guard_name'     => "web",
            ],[
                'name'           => "POST-/panel/users/{user}/roles",
                'display_name'   => "نقش مدیران",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/users",
                'display_name'   => "لیست کاربران",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/users/create",
                'display_name'   => "فرم ایجاد کاربر",
                'guard_name'     => "web",
            ],[
                'name'           => "POST-/panel/users",
                'display_name'   => "ایجاد کاربر",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/users/{user}",
                'display_name'   => "مشاهده کاربر",
                'guard_name'     => "web",
            ],[
                'name'           => "GET-/panel/users/{user}/edit",
                'display_name'   => "فرم ویرایش کاربر",
                'guard_name'     => "web",
            ],[
                'name'           => "PUT-/panel/users/{user}",
                'display_name'   => "ویرایش کاربر",
                'guard_name'     => "web",
            ],[
                'name'           => "DELETE-/panel/users/{user}",
                'display_name'   => "حذف کاربر",
                'guard_name'     => "web",
            ],
        ]);
    }
}
