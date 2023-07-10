<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained('users')->references('id')->cascadeOnDelete();

            $table->string('platforms')->default('[]');

            $table->text('fb_access_token')->nullable();
            $table->text('fb_page_token')->nullable();

            $table->text('twiter_access_token')->nullable();
            $table->text('twiter_refresh_token')->nullable();

            $table->text('insta_access_token')->nullable();
            $table->text('insta_user_id')->nullable();

            $table->text('linkedin_accesstoken')->nullable();
            $table->text('linkedin_user_id')->nullable();
            $table->text('linkedin_page_id')->nullable();



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
        Schema::dropIfExists('accounts');
    }
};
