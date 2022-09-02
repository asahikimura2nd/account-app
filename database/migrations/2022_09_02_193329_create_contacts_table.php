<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            
                        /**
             * 
             * お問い合わせ側(user)従
             * 
             */
            $table->id();
            //外部キー
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->unsignedBigInteger('response_id')->nullable();
            // $table->primary('user_id','response_id');
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('response_id')->references('id')->on('responses')->onDelete('cascade');            

            $table->string('user_random_id')->nullable();
            $table->string('user_company',20)->nullable();
            $table->string('user_name',20)->nullable();
            $table->string('user_tel')->nullable(); //https://webukatu.com/questions/detail/ec2c60b8195ea2b4ac9901a24777d1cf/
            $table->string('user_email')->nullable();
            $table->date('user_birth_date')->nullable();//https://code-kitchen.dev/html/input-date/#%E6%97%A5%E4%BB%98%E3%81%AE%E5%80%A4%E3%81%AF%E3%81%A9%E3%82%93%E3%81%AA%E5%BD%A2%E5%BC%8F%E3%81%AB%E3%81%AA%E3%81%A3%E3%81%A6%E3%82%8B%EF%BC%9F
            $table->string('user_gender')->nullable();
            $table->string('user_job')->nullable();
            $table->string('user_content')->nullable();
          

            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade');

            // $table->foreign('user_id')->references('id')->on('users');
            // foreign(フィールド) = このフィールドは下記を参照します
            // references(フィールド) = 参照先のフィールド
            // on(テーブル名) = 参照先のテーブル
            // onDelete('cascade'); = 上記が削除されたら該当データも一緒に削除
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
        Schema::dropIfExists('contacts');
    }
}
