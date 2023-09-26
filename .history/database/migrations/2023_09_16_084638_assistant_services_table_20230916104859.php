<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssistantServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistant_services', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->Integer('patient_id');
            $table->Integer('patient_id_from_where');
            $table->integer('tavel_time', 3);
            $table->date('service_date');
            $table->time('service_start_time');
            $table->time('service_end_time');
            $table->Integer('service_id');
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
