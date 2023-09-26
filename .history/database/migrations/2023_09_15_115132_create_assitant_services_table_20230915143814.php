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
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('patient_id')->nullable();
            $table->bigInteger('patient_id_from_where')->nullable();
            $table->int('tavel_time', 3);
            $table->date('service_date');
            $table->time('service_start_time');
            $table->time('service_end_time');
            $table->bigInteger('service_id')->nullable();
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