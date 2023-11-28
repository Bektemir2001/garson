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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('establishment_id');
            $table->integer('number');
            $table->string('qr');
            $table->integer('floor')->default(1);
            $table->timestamps();

            $table->index('establishment_id', 'table_establishment_idx');
            $table->foreign('establishment_id', 'table_establishment_fk')
                ->on('establishments')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
