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
        Schema::create('computer_exports', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->char('title',255);
            $table->foreignId('export_id')->constrained('exports')->cascadeOnDelete();
            $table->text('files');
            $table->date('date');
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
        Schema::dropIfExists('computer_exports');
    }
};