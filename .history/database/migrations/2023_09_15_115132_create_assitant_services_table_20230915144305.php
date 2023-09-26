<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssitantServicesTable extends Migration
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
            $table->bigInteger('user_id', 20);
            $table->bigInteger('patient_id', 20);
            $table->bigInteger('patient_id_from_where', 20);
            $table->integer('tavel_time', 3);
            $table->date('service_date');
            $table->time('service_start_time');
            $table->time('service_end_time');
            $table->bigInteger('service_id', 20);
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