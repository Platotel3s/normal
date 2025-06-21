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
        Schema::table('bukus', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable()->after('judul');
            $table->unsignedBigInteger('penerbit_id')->nullable()->after('author_id');
            $table->unsignedBigInteger('tahun_id')->nullable()->after('penerbit_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bukus', function (Blueprint $table) {
            //
        });
    }
};
