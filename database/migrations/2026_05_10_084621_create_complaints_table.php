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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            // User pembuat pengaduan
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Staff yang menangani
            $table->foreignId('assigned_staff_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Admin yang menangani
            $table->foreignId('assigned_admin_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Nomor pengaduan
            $table->string('complaint_code')->unique();

            // Data pengaduan
            $table->string('title');

            $table->enum('category', [
                'pelayanan',
                'petugas',
                'fasilitas',
                'website',
                'lainnya'
            ]);

            $table->text('description');

            // Upload bukti
            $table->string('evidence_file')->nullable();

            // Status pengaduan
            $table->enum('status', [
                'submitted',
                'in_review',
                'responded',
                'closed'
            ])->default('submitted');

            // Feedback admin
            $table->text('admin_feedback')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
