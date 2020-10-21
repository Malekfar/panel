run composer require amiranbari/panel

run php artisan vendor:publish

chang locale to fa in config/app.php

change composer.json autoload section like below

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
    
run composer dump-autoload

change user provider model in auth.php in config directory like below

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
    
    
    
    
  php artisan migrate
  
  add these seeders call in DatabaseSeeder.php

	$this->call(Panel_UserSeeder::class);
	$this->call(Panel_MenuSeeder::class);
	$this->call(Panel_PermissionSedder::class);
	
php artisan db:seed

php artisan serve

go to 127.0.0.1:8000/login

email: admin@gmail.com
password: 123456

enjoy it.
