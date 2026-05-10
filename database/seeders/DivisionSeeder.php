<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            [
                'name' => 'Sekretaris',
                'description' => 'Divisi sekretariat dan administrasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pelayanan dan Pembinaan',
                'description' => 'Divisi pelayanan dan pembinaan masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
