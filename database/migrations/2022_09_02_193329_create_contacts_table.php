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
            $table->string('user_company',20)->nullable();
            $table->string('user_name',20)->nullable();
            $table->string('user_tel')->nullable(); //https://webukatu.com/questions/detail/ec2c60b8195ea2b4ac9901a24777d1cf/
            $table->string('user_email')->nullable();
            $table->date('user_birth_date')->nullable();//https://code-kitchen.dev/html/input-date/#%E6%97%A5%E4%BB%98%E3%81%AE%E5%80%A4%E3%81%AF%E3%81%A9%E3%82%93%E3%81%AA%E5%BD%A2%E5%BC%8F%E3%81%AB%E3%81%AA%E3%81%A3%E3%81%A6%E3%82%8B%EF%BC%9F
            $table->string('user_gender')->nullable();
            $table->string('user_job')->nullable();
            $table->string('user_content')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
