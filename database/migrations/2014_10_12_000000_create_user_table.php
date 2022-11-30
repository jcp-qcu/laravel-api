<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate
     * php artisan migrate:rollback
     * php artisan migrate:fresh (remove and recreate table)
     * php artisan make:migration <migration_name>
     * php artisan make:seeder <seeder_name>
     * php artisan db:seed
     * php artisan make:controller <controller_name>
     * php artisan make:factory <factory_name>
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('role')->nullable();
            $table->string('img')->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('suffix')->nullable();
            $table->string('street')->nullable();
            $table->string('age')->nullable();
            // $table->string('city')->nullable();
            // $table->string('province')->nullable();
            // $table->string('zip_code')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->unique()->nullable();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            //$table->rememberToken();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
