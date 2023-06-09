<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('delete');
            $table->unsignedBigInteger('resolveur_id');
            $table->foreign('resolveur_id')->references('id')->on('resolveurs');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients'); 
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
        Schema::dropIfExists('projects');
    }
}
