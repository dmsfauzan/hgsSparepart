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
        Schema::create('tr_partin_d', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partin_h_id')->constrained('tr_partin_h')->cascadeOnDelete();
            $table->foreignId('part_id')->constrained('parts');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partin_d_s');
    }
};
