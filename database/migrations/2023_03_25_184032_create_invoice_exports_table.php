<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_exports', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no');
            $table->date('voucher_date');
            $table->string('invoice_no');
            $table->foreignId('subSection_id')->constrained('sub_sections')->cascadeOnDelete();
            $table->string('user_id');

            // $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

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
        Schema::dropIfExists('invoice_exports');
    }
};
