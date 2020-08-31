php artisan vendor:publish
chang locale to fa
change atouloade section like below
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
    
composer dump-autoload
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
    
    
    
    
  run php artisan migrate
  
  add these seeders call in DatabaseSeeder.php

	$this->call(Panel_UserSeeder::class);
	$this->call(Panel_MenuSeeder::class);
	$this->call(Panel_PermissionSedder::class);
