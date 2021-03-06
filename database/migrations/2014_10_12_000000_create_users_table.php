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
            $table->string('name');
            $table->string('address');
            $table->date('DOB');
            $table->string('phone')->nullable();
            $table->char('sex');
            $table->string('email')->unique();
            $table->string('line_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('youtube_id')->nullable();
            $table->integer('documenttype_id');
            $table->string('documents');
            $table->string('ipaddress')->nullable();
            $table->integer('category_id');
            $table->string('bonus_history')->nullable();
            $table->string('note')->nullable();
            $table->string('labels')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(bcrypt('password'));
            $table->integer('is_admin')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
