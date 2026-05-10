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
                'user_id' => 3,

                'assigned_division_id' => 2,
                'assigned_staff_id' => 1,

                'type' => 'penelitian',

                'title' => 'Penelitian Sistem Pelayanan Lapas',

                'description' => 'Pengajuan izin penelitian mengenai digitalisasi pelayanan lapas.',

                'location' => 'Lapas Kelas I Bandung',

                'document_file' => 'submissions/proposal-penelitian.pdf',

                'start_date' => '2026-06-01',
                'end_date' => '2026-06-30',

                'status' => 'submitted',

                'admin_notes' => 'hello world',

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
