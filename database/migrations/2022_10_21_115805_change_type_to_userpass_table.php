<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeToUserpassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('tel');
            $table->integer('prefectures');
            $table->string('city');
            $table->string('address_and_building')->nullable();
            //詳細
            $table->string('company');
            $table->string('name_katakana');
            $table->string('postcode');
            $table->text('content')->nullable();
            $table->softDeletes()->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

