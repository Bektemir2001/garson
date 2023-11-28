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
        Schema::create('eating_establishments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('logo')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();


            $table->index('organization_id', 'establishment_organization_idx');
            $table->index('manager_id', 'establishment_manager_idx');

            $table->foreign('organization_id', 'establishment_organization_fk')
                ->on('organizations')
                ->references('id');
            $table->foreign('manager_id', 'establishment_manager_fk')
                ->on('users')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eating_establishments');
    }
};
