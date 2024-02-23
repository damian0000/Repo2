<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignAllRoleUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roleUsers', function (Blueprint $table) {

            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('role_id', 'ru_role_id_roles_foreign')->references('id')->on('roles');
            $table->foreign('user_id', 'ru_user_id_users_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roleUsers', function (Blueprint $table) {
        $table->dropForeign('ru_role_id_roles_foreign');
        $table->dropForeign('ru_user_id_users_foreign');
        });
    }
}
