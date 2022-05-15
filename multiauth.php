<?php

Befor makeign multiaut you have to make a authentication first
Then...........
1. Make a model name Admin
2. Set the table with this collum
 Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 25)->nullable();
            $table->tinyInteger('admin_role_id')->default(2)->comment('1-super admin');
            $table->string('image', 100 )->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1-active, 2-inactive');
        });

2. Make the table migration

4. Go to User Model and copy 
 	use Illuminate\Foundation\Auth\User as Authenticatable;

5. Then go to Admin model and paste : 
 	use Illuminate\Foundation\Auth\User as Authenticatable;

5. Form admin chagne the line (class Admin extends Admin) to:
 	class Admin extends Authenticatable

6. Go again User Model and copy:
 	 protected $fillable = [
        'name',
        'email',
        'password',
    ];

    and 

     protected $hidden = [
        'password',
        'remember_token',
       
    ];

7. Past it in Admin Model

8. Then open config/auth.php file
   		in the 'guards' section add this code,

   		 'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],


      and add this code in the 'provider' section,
      'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

9. Make a middleware name admin: php artisan make:middelware Admin

10. Open app\http\Kernel.php file and paste this line in the bottom of $routeMiddleware section:
		'admin' => \App\Http\Middleware\Admin::class,


11. Now go to Admin middleware and apply the condition before this line: (return $next($request)):

	if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.auth.login');
  	}

  	and Use Auth in the top of the page



 Congrets!! Now You can you Admin middleware at anywhere


