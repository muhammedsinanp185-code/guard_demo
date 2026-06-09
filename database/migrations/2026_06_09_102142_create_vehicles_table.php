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
       Schema::create('vehicles', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('owner_id');

    $table->string('vehicle_number');

    $table->string('vehicle_type');

    $table->string('status')->default('Active');

    $table->timestamps();

    $table->foreign('owner_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
