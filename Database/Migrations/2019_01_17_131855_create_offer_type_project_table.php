<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTypeProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'offer_type_project', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('offer_type_id');
                $table->foreign('offer_type_id')->references('id')->on('offer_types')->onDelete('cascade');
                $table->unsignedInteger('project_id');
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('offer_type_project');
    }
}
