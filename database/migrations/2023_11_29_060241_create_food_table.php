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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->longText('description');
            $table->integer('price');
            $table->timestamps();

            $table->index('organization_id', 'food_organization_idx');
            $table->index('category_id', 'food_category_idx');

            $table->foreign('organization_id', 'food_organization_fk')
                ->on('organizations')
                ->references('id');
            $table->foreign('category_id', 'food_category_fk')
                ->on('food_categories')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
