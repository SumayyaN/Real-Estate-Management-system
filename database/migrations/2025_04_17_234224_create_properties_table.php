<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();

            $table->enum('type', ['rent', 'sale']);
            $table->enum('status', ['available', 'sold', 'rented'])->default('available');

            $table->string('city');
            $table->string('address')->nullable();
            $table->string('image')->nullable();

            $table->decimal('price', 12, 2);

            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            

            $table->enum('property_type', ['land', 'building']);
            $table->enum('property_subtype', ['residential_plot', 'commercial_plot', 'apartment', 'office']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};