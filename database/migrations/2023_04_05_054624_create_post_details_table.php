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
        Schema::create('post_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->references('id')->cascadeOnDelete();
            $table->string('plateform')->nullable();
            $table->string('is_posted')->default(0);
            $table->string('likes')->nullable();
            $table->string('shares')->nullable();
            $table->string('social_id')->nullable();
            $table->string('comments')->nullable();

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
        Schema::dropIfExists('post_details');
    }
};
