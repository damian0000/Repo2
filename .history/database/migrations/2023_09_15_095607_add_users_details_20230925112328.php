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
            $table->string('surname', 30);
            $table->string('pesel', 11);
            $table->string('disability')->nullable();
            $table->string('phone', 15);
            $table->string('street', 30);
            $table->string('post_code', 6);
            $table->string('city', 20);
            $table->smallInteger('role_id');
            $table->smallInteger('company_id');
            $table->boolean('isActive');

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
            $table->dropColumn('pesel');
            $table->dropColumn('phone');
            $table->dropColumn('street');
            $table->dropColumn('post_code');
            $table->dropColumn('city');
            $table->dropColumn('isActive');
            $table->dropColumn('role');

        });
    }

}
