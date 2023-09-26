<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistant_services', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->length(20)->unsigned();
            $table->Integer('patient_id')->length(20)->unsigned();
            $table->Integer('patient_id_from_where')->length(20)->unsigned();
            $table->integer('tavel_time', 3);
            $table->date('service_date');
            $table->time('service_start_time');
            $table->time('service_end_time');
            $table->Integer('service_id')->length(20)->unsigned();
            $table->boolean('isDelete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistant_services');
    }
}