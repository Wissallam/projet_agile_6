<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclameursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclameurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            
    $table->foreign('user_id')->references('id')->on('users');
    $table->unsignedBigInteger('client_id');
    $table->foreign('client_id')->references('id')->on('clients');
            $table->string('name');
            $table->string('delete');
               $table->string('email')->unique();
               $table->timestamp('email_verified_at')->nullable();
              
                $table->string('image')->default('R.png');
               $table->integer('phone');
                $table->string('is_chef_reclameur')->default('false');
               
            
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
        Schema::dropIfExists('reclameurs');
    }
}
        
