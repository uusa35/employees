<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('employee_no');  // الرقم الوظيفي
            $table->enum('employer',['جامعة بغداد','جامعة الموصل','جامعة البصرة','جامعة الشمال','جامعة الجنوب'])->default('جامعة بغداد');
            $table->string('address')->nullable();
            $table->date('hiring_date');
            $table->string('card_id');
            $table->text('notes')->nullable();
            $table->boolean('is_admin')->default(0);


            $table->foreignId('employee_degree_id')->references('id')->on('employee_degrees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('social_status_id')->references('id')->on('social_status')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('title_id')->references('id')->on('titles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('certificate_id')->references('id')->on('certificates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('transportation_id')->references('id')->on('transportations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('university_service_id')->references('id')->on('university_services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('children_id')->references('id')->on('children')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('position_id')->references('id')->on('positions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
