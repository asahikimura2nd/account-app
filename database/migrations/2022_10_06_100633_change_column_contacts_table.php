<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->renameColumn('user_random_id','random_id');
            $table->renameColumn('user_company','company');
            $table->renameColumn('user_name','name');
            $table->renameColumn('user_tel','tel');
            $table->renameColumn('user_email','email');
            $table->renameColumn('user_birth_date','birth_date');
            $table->renameColumn('user_gender','gender');
            $table->renameColumn('user_job','job');
            $table->renameColumn('user_content','content');
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
