<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('phone');
            $table->string('street');
            $table->string('post_code');
            $table->string('city');
            $table->string('phone');
            $table->smallInteger('role');

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
            $table->dropColumn('surname');
            $table->dropColumn('phone');
            $table->dropColumn('street');
            $table->dropColumn('post_code');
            $table->dropColumn('city');
            $table->dropColumn('phone');
            $table=>dropColumn('role');

        });
    }
}