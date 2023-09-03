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
        Schema::create('censorships', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('sub_censorship_id')->constrained('sub_censorships')->cascadeOnDelete();
            $table->integer('number');
            $table->char('title', 255);
            $table->foreignId('import_id')->constrained('imports')->cascadeOnDelete();
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
        Schema::dropIfExists('censorships');
    }
};
