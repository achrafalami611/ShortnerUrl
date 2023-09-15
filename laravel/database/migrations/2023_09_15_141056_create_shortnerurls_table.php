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
        Schema::create('shortnerurls', function (Blueprint $table) {
            $table->id();
            $table->text('original_url');
            $table->text('url_description')->nullable();
            $table->string('short_url', 10)->unique();
            $table->integer('visits_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortnerurls');
    }
};
