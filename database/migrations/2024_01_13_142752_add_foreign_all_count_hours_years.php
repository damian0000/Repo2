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

            $table->foreign('assistant_id', 'chy_assistant_id_users_foreign')->references('id')->on('users');
            $table->foreign('patient_id', 'chy_patient_id_users_foreign')->references('id')->on('users');
            $table->foreign('project_id', 'chy_user_id_projects_foreign')->references('id')->on('projects');
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
            $table->dropForeign('chy_assistant_id_users_foreign');
            $table->dropForeign('chy_patient_id_users_foreign');
            $table->dropForeign('chy_user_id_projects_foreign');
        });
    }
}
