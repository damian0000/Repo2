<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignAllCountHoursYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countHoursYears', function (Blueprint $table) {


            $table->unsignedBigInteger('assistant_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('project_id');

            $table->foreign('assistant_id', 'assistant_id_hy_users_foreign')->references('id')->on('users');
            $table->foreign('patient_id', 'patient_id_hy_users_foreign')->references('id')->on('users');
            $table->foreign('project_id', 'user_id_hy_projects_foreign')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countHoursYears', function (Blueprint $table) {
            $table->dropForeign('assistant_id_hy_users_foreign');
            $table->dropForeign('patient_id_hy_users_foreign');
            $table->dropForeign('user_id_hy_projects_foreign');
        });
    }
}
