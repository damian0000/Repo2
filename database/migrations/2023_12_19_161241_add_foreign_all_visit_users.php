<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignAllVisitUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitUsers', function (Blueprint $table) {

            $table->unsignedBigInteger('assistant_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('from_patient_id');
            $table->unsignedBigInteger('visit_id');

            $table->foreign('assistant_id', 'assistant_id_visit_user_foreign')->references('id')->on('users');
            $table->foreign('patient_id', 'patient_id_visit_user_foreign')->references('id')->on('users');
            $table->foreign('from_patient_id', 'from_patient_id_visit_user_foreign')->references('id')->on('users');

            $table->foreign('visit_id', 'visit_id_visit_foreign')->references('id')->on('visits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitUsers', function (Blueprint $table) {
            $table->dropForeign('assistant_id_visit_user_foreign');
            $table->dropForeign('patient_id_visit_user_foreign');
            $table->dropForeign('from_patient_id_visit_user_foreign');
            $table->dropForeign('visit_id_visit_foreign');
        });
    }
}