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
        Schema::create('cms_fragments', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug');
            $table->string('fragment_key');
            $table->string('type')->default('text');
            $table->longText('content')->nullable();
            $table->timestamps();

            $table->unique(['page_slug', 'fragment_key']);
            $table->index('page_slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_fragments');
    }
};
