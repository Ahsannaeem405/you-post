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
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->string('profile_image')->nullable(); 
            $table->string('fb_image')->nullable(); 
            $table->string('inst_image')->nullable(); 
            $table->string('twt_image')->nullable(); 
            $table->string('link_image')->nullable(); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->dropColumn('profile_image');
            $table->dropColumn('fb_image');
            $table->dropColumn('inst_image');
            $table->dropColumn('twt_image');
            $table->dropColumn('link_image');



        });
    }
};
