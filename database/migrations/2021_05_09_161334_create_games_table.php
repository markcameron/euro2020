<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('home_team_id')->unsigned()->index();
            $table->foreign('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('away_team_id')->unsigned()->index();
            $table->foreign('away_team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->boolean('can_predict')->default(false);
            $table->boolean('is_ko_stage')->default(false);

            $table->integer('stadium_id')->unsigned()->index();
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade');

            $table->dateTime('date');

            $table->tinyInteger('score_home')->nullable()->unsigned();
            $table->tinyInteger('score_away')->nullable()->unsigned();

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
        Schema::drop('games');
    }
}
