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
        Schema::create('custom_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->string('type')->nullable();
            $table->string('vehicleRegNumber')->nullable();
            $table->string('vehiclePlate')->nullable();
            $table->string('name')->nullable();
            $table->integer('status')->default(1);
            $table->integer('is_deleted')->default(0);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_details');
    }
};
