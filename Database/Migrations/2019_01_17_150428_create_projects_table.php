<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'projects', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedInteger('project_type_id')->nullable();
                $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
                $table->string('slug')->nullable();
                $table->string('name');
                $table->text('description')->nullable();
                $table->text('place')->nullable();
                $table->text('investment')->nullable();
                $table->text('resume')->nullable();
                $table->text('entertainment')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('country')->nullable();
                $table->unsignedInteger('base_price')->nullable();
                $table->unsignedInteger('total_area')->default(0)->nullable();
                $table->boolean('gas')->default(0)->nullable();
                $table->boolean('light')->default(0)->nullable();
                $table->boolean('water')->default(0)->nullable();
                $table->boolean('featured')->default(0)->nullable();
                $table->timestamps();
            }
        );
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
