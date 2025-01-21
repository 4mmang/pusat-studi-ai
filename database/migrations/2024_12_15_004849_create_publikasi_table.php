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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('judul');
            $table->string('penyelenggara');
            $table->date('tanggal_publikasi');
            // $table->enum('level', ['nasional', 'internasional', 'nasional bereputasi', 'internasional bereputasi']);
            $table->enum('level', ['Quartile-1 (Q1)', 'Quartile-2 (Q2)', 'Quartile-3 (Q3)', 'Quartile-4 (Q4)', 'No-Quartile', 'Nasional']);
            $table->text('link_akses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi');
    }
};
