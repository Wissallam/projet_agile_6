<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolveursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolveurs', function (Blueprint $table) {
            $table->id();
           
          
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('delete');
                    $table->string('name');
                    $table->string('specialite');
                       $table->string('email')->unique();
                       $table->timestamp('email_verified_at')->nullable();    
                        $table->string('image')->default('R.png');
                       $table->integer('phone');
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
        Schema::dropIfExists('resolveurs');
    }
}
