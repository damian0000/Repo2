<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignAllProjectUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projectUsers', function (Blueprint $table) {

            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('project_id', 'pu_project_id_projects_foreign')->references('id')->on('projects');
            $table->foreign('user_id', 'pu_user_id_users_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projectUsers', function (Blueprint $table) {
            $table->dropForeign('pu_project_id_projects_foreign');
            $table->dropForeign('pu_user_id_users_foreign');
        });
    }
}
