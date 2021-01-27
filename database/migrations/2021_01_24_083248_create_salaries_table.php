<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('basic_salary');
            $table->integer('certificate_allowance')->default(0);
            $table->integer('transportation_allowance')->default(0);
            $table->integer('social_status_allowance')->default(0);
            $table->integer('children_allowance')->default(0);
            $table->integer('title_allowance')->default(0);
            $table->integer('position_allowance')->default(0);
            $table->integer('other_allowance')->default(0);

            $table->dateTime('salary_date');
            $table->foreignId('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('salaries');
    }
}
