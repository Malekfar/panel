config your database in .env

run composer require amiranbari/panel:dev-master

run php artisan vendor:publish - then insert 1 and enter

if you are using laravel8 you should edit User.php in Models directory like below

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
		'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}


chang locale to fa in config/app.php

if you are using laravel7 change composer.json autoload section like below

   "autoload": {
        "psr-4": {
            "App\\": "app/"
        },
        "classmap": [
            "database/seeds",
            "database/factories",
            "app/Models/"
        ],
        "files": [
            "app/Tools/helpers.php"
        ]
    }
    
if you are using laravel8 change composer.json autoload section like below

   "autoload": {
           "psr-4": {
               "App\\": "app/",
               "Database\\Factories\\": "database/factories/",
               "Database\\Seeders\\": "database/seeders/"
           },
   		"files": [ "app/Tools/helpers.php" ]
       }   
    
run composer dump-autoload

if you are using laravel7 change user provider model in auth.php in config directory like below

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
    
    
add these seeders call in DatabaseSeeder.php

	$this->call(Panel_UserSeeder::class);
	$this->call(Panel_MenuSeeder::class);
	$this->call(Panel_PermissionSeeder::class);
	
php artisan migrate:fresh --seed
  

php artisan serve

go to 127.0.0.1:8000/panel/login

email: admin@gmail.com
password: 123456

enjoy it.
