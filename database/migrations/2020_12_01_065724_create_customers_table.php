<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->date('DOB');
            $table->string('phone');
            $table->char('sex');
            $table->string('email')->unique();
            $table->string('line_id')->unique();
            $table->string('facebook_id')->unique();
            $table->string('twitter_id')->unique();
            $table->string('telegram_id')->unique();
            $table->string('youtube_id')->unique();
            $table->integer('documenttype_id');
            $table->string('documents');
            $table->string('ipaddress');
            $table->integer('category_id');
            $table->string('bonus_history');
            $table->string('note');
            $table->string('labels');
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
        Schema::dropIfExists('customers');
    }
}
