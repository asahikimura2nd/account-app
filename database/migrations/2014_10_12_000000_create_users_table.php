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

            //管理者（主）
            // $table->string('name',100)->nullable();
            $table->string('admin_email')->unique()->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            // $table->rememberToken();
            //お問い合わせ
            
            $table->string('member_id')->nullable();
            $table->string('member_name')->nullable();
            $table->string('member_email')->nullable();
            $table->string('member_tel')->nullable();
            $table->string('member_prefectures')->nullable();
            $table->string('member_city')->nullable();
            $table->string('member_address_and_building')->nullable();
            //詳細
            $table->string('member_company')->nullable();
            $table->string('member_name_katakana')->nullable();
            $table->string('member_password')->nullable();
            $table->string('member_postcode')->nullable();
            $table->text('member_content')->nullable();

            //顧客対応状況
            $table->string('status')->nullable();
            //顧客お問い合わせ備考
            $table->string('remarks')->nullable();
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
