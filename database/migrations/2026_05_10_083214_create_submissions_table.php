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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();

            // User pembuat pengajuan
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Divisi tujuan
            $table->foreignId('assigned_division_id')
                ->nullable()
                ->constrained('divisions')
                ->nullOnDelete();

            // Admin / staff yang menangani
            $table->foreignId('assigned_staff_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Jenis pengajuan
            $table->enum('type', [
                'penelitian',
                'magang',
                'pkl'
            ]);

            // Data pengajuan
            $table->string('title');

            $table->text('description')->nullable();

            $table->string('location');

            // Upload PDF
            $table->string('document_file');

            // Tanggal kegiatan
            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();

            // Status workflow
            $table->enum('status', [
                'submitted',
                'revision',
                'verified',
                'in_review',
                'approved',
                'rejected'
            ])->default('submitted');

            // Catatan admin
            $table->text('admin_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
