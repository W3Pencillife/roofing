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
        Schema::table('settings', function ($table) {
            $table->string('hero_bg')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_text')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('settings', function ($table) {
            $table->dropColumn(['hero_bg', 'hero_title', 'hero_text']);
        });
    }

};
