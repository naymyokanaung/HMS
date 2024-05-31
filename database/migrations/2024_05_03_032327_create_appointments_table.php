<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->date('date1');
            $table->time('time1');
            $table->text('diagnosis');
            $table->date('date2');
            $table->time('time2');
            $table->string('file');
            $table->boolean('approvedBy')->nullable();
            $table->timestamps();
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('patient_id')->on('patients')
                ->references('id')->onDelete('cascade');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('doctor_id')->on('doctors')
                ->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
