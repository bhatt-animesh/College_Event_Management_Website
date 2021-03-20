<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_details', function (Blueprint $table) {
            $table->id('team_id');
            //$table->string('team_id')->nullable();
            $table->string('team_name')->nullable();
            $table->string('team_leader_id')->nullable();
            $table->string('team_size')->nullable();
            $table->string('team_department')->nullable();
            $table->string('hod_id')->nullable();
            $table->string('dr_name')->nullable();
            $table->string('dr_contact_number')->nullable();
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
        Schema::dropIfExists('team_details');
    }
}
