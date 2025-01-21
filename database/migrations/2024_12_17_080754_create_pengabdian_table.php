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
        Schema::create('pengabdian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('judul');
            $table->string('penyelenggara');
            $table->date('tanggal_pengabdian');
            $table->double('dana');
            $table->enum('level', ['mandiri','universitas', 'nasional', 'internasional', 'lainnya']);
            $table->text('link_akses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengabdian');
    }
};
