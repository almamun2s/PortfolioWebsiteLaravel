<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('hi', 20)->nullable();
            $table->string('name', 25)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('description', 255)->nullable();

            $table->string('welcome_title', 25)->nullable();
            $table->text('welcome_description')->nullable();
            $table->string('quality_icon', 20)->nullable();
            $table->string('quality_text', 50)->nullable();
            $table->string('performance_icon', 20)->nullable();
            $table->string('performance_text', 50)->nullable();
            $table->string('support_icon', 20)->nullable();
            $table->string('support_text', 50)->nullable();

            $table->boolean('service_show')->default(true)->nullable();
            $table->string('service_title')->nullable();
            $table->integer('service_count')->nullable();

            $table->boolean('process_show')->default(true)->nullable();
            $table->string('process_title')->nullable();

            $table->boolean('portfolio_show')->default(true)->nullable();
            $table->string('portfolio_title')->nullable();
            $table->integer('portfolio_count')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
