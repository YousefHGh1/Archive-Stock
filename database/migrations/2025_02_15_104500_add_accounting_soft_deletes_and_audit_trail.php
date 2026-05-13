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
        // Add soft deletes and audit fields to invoices table
        Schema::table('invoices', function (Blueprint $table) {
            $table->softDeletes(); // Adds deleted_at column
            $table->unsignedBigInteger('deleted_by')->nullable()->after('deleted_at');
            $table->text('delete_reason')->nullable()->after('deleted_by');
            $table->enum('status', ['active', 'cancelled', 'deleted'])->default('active')->after('delete_reason');
            
            // Add unique constraint for voucher_no (including soft deletes)
            $table->unique('voucher_no', 'invoices_voucher_no_unique');
        });

        // Add soft deletes and audit fields to invoice_exports table
        Schema::table('invoice_exports', function (Blueprint $table) {
            $table->softDeletes(); // Adds deleted_at column
            $table->unsignedBigInteger('deleted_by')->nullable()->after('deleted_at');
            $table->text('delete_reason')->nullable()->after('deleted_by');
            $table->enum('status', ['active', 'cancelled', 'deleted'])->default('active')->after('delete_reason');
            
            // Add unique constraint for voucher_no (including soft deletes)
            $table->unique('voucher_no', 'invoice_exports_voucher_no_unique');
        });

        // Create archive table for deleted records
        Schema::create('deleted_vouchers_archive', function (Blueprint $table) {
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
        });

        // Add foreign key constraints
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('invoice_exports', function (Blueprint $table) {
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('deleted_vouchers_archive', function (Blueprint $table) {
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['deleted_by']);
            $table->dropUnique('invoices_voucher_no_unique');
            $table->dropColumn(['deleted_at', 'deleted_by', 'delete_reason', 'status']);
        });

        Schema::table('invoice_exports', function (Blueprint $table) {
            $table->dropForeign(['deleted_by']);
            $table->dropUnique('invoice_exports_voucher_no_unique');
            $table->dropColumn(['deleted_at', 'deleted_by', 'delete_reason', 'status']);
        });

        Schema::dropIfExists('deleted_vouchers_archive');
    }
};
