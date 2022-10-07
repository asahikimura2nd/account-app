<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('member_name', 'name');
            $table->renameColumn('member_email','email');
            $table->renameColumn('member_password','password');
            $table->renameColumn('member_tel','tel');
            $table->renameColumn('member_prefectures','prefectures');
            $table->renameColumn('member_city','city');
            $table->renameColumn('member_address_and_building','address_and_building');
            //詳細
            $table->renameColumn('member_company','company');
            $table->renameColumn('member_name_katakana','name_katakana');
            $table->renameColumn('member_postcode','postcode');
            $table->renameColumn('member_content','content');
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
