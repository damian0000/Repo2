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
            $table->text('disability')->nullable();
            $table->string('phone', 15);
            $table->string('street', 70);
            $table->string('post_code', 6);
            $table->string('city', 30);
            $table->string('status', 30)->default('Pracujący');
            $table->boolean('is_delete')->default(0);
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
            $table->dropColumn('status');
            $table->dropColumn('is_delete');

        });
    }

}