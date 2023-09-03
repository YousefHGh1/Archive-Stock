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
        // 2023_01_29_103620_create_archive_nots_table
        Schema::create('archive_nots', function (Blueprint $table) {
            $table->id();
            $table->string('sender');
            $table->foreignId('type_id')->constrained('types')->cascadeOnDelete();
            $table->string('title');
            $table->string('reciver');
            // $table->foreignId('reciver')->constrained('users')->cascadeOnDelete();
            $table->text('files');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('archive_nots');
    }
};