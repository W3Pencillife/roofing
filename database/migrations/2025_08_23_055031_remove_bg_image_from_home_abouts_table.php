<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_abouts', function (Blueprint $table) {
            $table->dropColumn('bg_image');
        });
    }

    public function down(): void
    {
        // Do nothing — we don't want to re-add the column
    }
};
