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
        Schema::create('diesel_exports', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('voucher')->unique();
            $table->date('date');
            $table->integer('num_section');
            $table->integer('num_note');
            $table->foreignId('sub_section_id')->constrained('sub_sections')->restrictOnDelete();
            $table->foreignId('section_id')->constrained('sections')->restrictOnDelete();
            $table->foreignId('typesfuel_id')->constrained('types_fuels')->cascadeOnDelete();

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
        Schema::dropIfExists('diesel_exports');
    }
};
