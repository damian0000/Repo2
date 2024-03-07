<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignAssistantPatienntsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assistantPatients', function (Blueprint $table) {

            $table->unsignedBigInteger('assistant_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('project_id');

            $table->foreign('assistant_id', 'asp_assistant_id_users_foreign')->references('id')->on('users');
            $table->foreign('patient_id', 'asp_patient_id_users_foreign')->references('id')->on('users');
            $table->foreign('project_id', 'asp_project_id_projects_foreign')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assistantPatients', function (Blueprint $table) {
            $table->dropForeign('asp_assistant_id_users_foreign');
            $table->dropForeign('asp_patient_id_users_foreign');
            $table->dropForeign('asp_project_id_projects_foreign');
        });
    }
}
