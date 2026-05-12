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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // USER DATA FROM FRONTEND
            $table->string('name');
            $table->string('email');
            $table->string('phone');

            // COURSE DATA FROM FRONTEND JSON
            $table->string('course_name');
            $table->string('course_mode')->nullable();
            $table->string('batch_type')->nullable();
            $table->string('batch_start')->nullable();
            $table->string('batch_duration')->nullable();
            $table->string('batch_time')->nullable();
            $table->string('batch_days')->nullable();

            $table->string('country');
            $table->string('currency');

            $table->string('gateway');
            $table->string('transaction_id')->nullable();

            $table->decimal('amount', 10, 2);

            $table->string('status')->default('pending');

            $table->json('response')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
