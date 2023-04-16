<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            
                $table->string('username')->unique();
                $table->string('password');
                $table->string('delete');
                $table->rememberToken();
                $table->timestamps();
                $table->string('role')->default(1);
                
              
               // $table->binary('image');
               // $table->string('phone');
               // $table->boolean('chef_utilisateur');
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
