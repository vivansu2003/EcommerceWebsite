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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000);
            $table->string('link', 1000);
            $table->unsignedInteger('sort_order')->default(1);
            $table->unsignedInteger('parent_id')->default(0); //kieeur int
            $table->string('type');
            $table->string('position', 50);
            $table->unsignedInteger('table_id')->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('update_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
