<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('e_name')->nullable();
            $table->string('e_venue')->nullable();
            $table->string('e_date')->nullable();
            $table->string('e_time')->nullable();
            $table->string('e_type')->nullable();
            $table->string('e_category')->nullable();
            $table->string('e_team_size')->nullable();
            $table->enum('e_gender', ['male','female','both'])->default('both');
            $table->enum('e_parti', ['individual','team','hod']);
            $table->string('e_c_name')->nullable();
            $table->string('e_c_contact')->nullable();
            $table->LongText('e_description')->nullable();
            $table->LongText('e_rules')->nullable();
            $table->LongText('e_guidlines')->nullable();
            $table->LongText('e_jud_cri')->nullable();
            $table->LongText('e_prize')->nullable();
            $table->enum('visible_to_user',['0','1'])->default('1');
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
        Schema::dropIfExists('events');
    }
}
