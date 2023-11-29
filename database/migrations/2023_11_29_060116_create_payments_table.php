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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('payment_type_id');
            $table->timestamps();

            $table->index('payment_type_id', 'payment_payment_type_idx');
            $table->foreign('payment_type_id', 'payment_payment_type_fk')
                ->on('payment_types')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pyments');
    }
};
