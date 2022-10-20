<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('company')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
            $table->string('tel')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('birth_date')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
            $table->string('job')->nullable(false)->change();
            $table->string('status')->nullable(false)->change();
            $table->text('content')->nullable()->change();
            $table->text('remarks')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }
}
