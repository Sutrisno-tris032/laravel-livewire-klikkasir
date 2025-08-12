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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('transaction_uid');
            $table->string('transaction_code')->unique();
            $table->integer('kasir_id')->nullable();
            $table->decimal('total_amount')->unsigned();
            $table->integer('payment_method_id');
            $table->string('payment_method_name');
            $table->integer('payment_status_id');
            $table->string('payment_status_name');
            $table->decimal('discount_amount')->nullable()->default(0);
            $table->decimal('task_amount')->nullable();
            $table->date('transaction_date');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
