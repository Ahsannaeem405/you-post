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
        //
        Schema::table('accounts', function (Blueprint $table) {
            $table->text('youpost_content')->nullable();
            $table->text('fb_content')->nullable();
            $table->text('ins_content')->nullable();
            $table->text('twitter_content')->nullable();
            $table->text('linked_content')->nullable();
        });
      

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('youpost_content');
            $table->dropColumn('fb_content');
            $table->dropColumn('ins_content');
            $table->dropColumn('twitter_content');
            $table->dropColumn('linked_content');
        });
       


    }
};
