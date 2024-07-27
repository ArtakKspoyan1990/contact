<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_user_id');
            $table->string('img_name', 42)->nullable();
            $table->string('bg_img_name', 42)->nullable();
            $table->string('logo_name', 42)->nullable();
            $table->string('full_name')->nullable();
            $table->string('position')->nullable();
            $table->string('phone')->nullable();
            $table->string('sms')->nullable();
            $table->string('website')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('telegram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('messenger')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tik_tok')->nullable();
            $table->string('location')->nullable();
            $table->string('viber')->nullable();
            $table->string('youtube')->nullable();
            $table->string('email')->nullable();
            $table->string('disconts')->nullable();
            $table->timestamps();
            $table->foreign('company_user_id')->references('id')->on('company_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_contacts');
    }
}
