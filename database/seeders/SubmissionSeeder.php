<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('submissions')->insert([
            [
                'user_id' => 5,
                'type' => 'penelitian',
                'title' => 'Penelitian Sistem Pelayanan Lapas',
                'description' => 'Pengajuan izin penelitian mengenai digitalisasi pelayanan lapas.',
                'location' => 'Lapas Kelas I Bandung',
                'document_file' => 'submissions/test.pdf',
                'start_date' => '2026-06-01',
                'end_date' => '2026-06-30',
                'status' => 'submitted',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
