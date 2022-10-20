<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
            $table->string('password')->nullable()->change();
            $table->string('tel')->nullable(false)->change();
            $table->integer('prefectures')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('address_and_building')->nullable()->change();
            $table->string('company')->nullable(false)->change();
            $table->string('name_katakana')->nullable(false)->change();
            $table->string('postcode')->nullable(false)->change();
            $table->text('content')->nullable()->change();
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
