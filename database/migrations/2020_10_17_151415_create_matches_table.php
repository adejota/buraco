<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('opponent_id');
            $table->integer('max_points');
            $table->time('time_limit')->nullable()->default(null);
            $table->time('current_time')->default(0);
            $table->integer('current_round')->default(1);
            $table->integer('total_score')->default(0);
            $table->integer('opponent_total_score')->default(0);
            $table->string('result')->nullable()->default('playing');
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
        Schema::dropIfExists('matches');
    }
}
