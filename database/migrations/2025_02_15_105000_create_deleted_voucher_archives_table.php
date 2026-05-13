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
        Schema::create('deleted_voucher_archives', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_type'); // 'invoice' or 'invoice_export'
            $table->string('voucher_no');
            $table->date('voucher_date');
            $table->string('invoice_no');
            $table->unsignedBigInteger('original_id'); // Original record ID
            $table->json('original_data'); // Complete record data as JSON
            $table->unsignedBigInteger('deleted_by');
            $table->text('delete_reason');
            $table->timestamp('deleted_at');
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['voucher_type', 'voucher_no']);
            $table->index('deleted_by');
            $table->index('deleted_at');
            
            // Foreign key constraint
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deleted_voucher_archives');
    }
};
