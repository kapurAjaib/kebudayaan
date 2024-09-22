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
        Schema::create('culture_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('culture_id')->constrained('cultures', 'id')->onDelete('cascade');
            $table->string('tag_name', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culture_tags');
    }
};
