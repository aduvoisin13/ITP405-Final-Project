<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('type');
            $table->rememberToken();
            $table->timestamps();
        });
        
        $user = new User();
        $user->email = 'admin';
        $user->password = Hash::make('laravel');
        $user->type = 'admin';
        $user->save();
        
        $user = new User();
        $user->email = 'test@yungbuck.herokuapp.com';
        $user->password = Hash::make('asdfjkl;');
        $user->type = 'member';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
