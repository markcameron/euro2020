<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime('last_seen')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->boolean('can_predict')->default(true);
            $table->string('nickname')->nullable()->default(null);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->string('background_color');
            $table->string('color');
            $table->string('catchphrase')->nullable()->default(null);
            $table->integer('active')->default(0);
            $table->string('password')->nullable()->default(null);
            $table->rememberToken();
            $table->string('activation_code')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('id_facebook')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
