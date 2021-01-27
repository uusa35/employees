<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_interventions', function (Blueprint $table) {
            $table->id();
            $table->integer('taxes');
            $table->integer('retirement');
            $table->integer('loan')->default(0);
            $table->string('loan_notes')->nullable();
            $table->integer('others')->default(0);
            $table->string('notes')->nullable();
            $table->foreignId('salary_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('employee_interventions');
    }
}
