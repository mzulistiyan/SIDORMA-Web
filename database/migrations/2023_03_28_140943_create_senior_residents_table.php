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
        Schema::create('senior_residents', function (Blueprint $table) {
            $table->integer('nim')->primary();
            $table->string('name');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('no_telp');
            $table->string('alamat');
            $table->integer('id_gedung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senior_residents');
    }
};
