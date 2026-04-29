<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('agency_name');
            $table->string('business_category');
            $table->string('product_name');
            $table->string('address');
            $table->string('premises_address');
            $table->string('product_image')->nullable(); // stored file path
            $table->string('premises_image')->nullable(); // stored file path
            $table->text('product_description');
            $table->string('reference_number')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};