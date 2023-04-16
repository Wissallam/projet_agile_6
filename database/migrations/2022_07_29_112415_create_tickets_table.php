<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titre');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->integer('chef');
            $table->unsignedBigInteger('reclameur_id');
            $table->foreign('reclameur_id')->references('id')->on('reclameurs');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('categorie');
            $table->string('priorite');
            $table->datetime('debut');
            $table->string('duree');
            $table->datetime('derniere_modification');
            $table->string('statut');
            $table->string('fil');
            $table->string('resolveurs');
            $table->string('situation');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
