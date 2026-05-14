<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'division_id' => 2,
            'name' => 'Suhendi Wongso, S.H., M.H.',
            'email' => 'suhendisyududu@gmail.com',
            'password' => Hash::make('password'),

            'identity_number' => '198505202010121003',
            'phone' => '081234567890',
            'institution' => 'Kantor Wilayah Direktorat Jenderal Pemasyarakatan Jawa Barat',

            'role' => 'admin',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Staff
        User::create([
            'division_id' => 1,
            'name' => 'Bagas Ariyansyah, S.Kom',
            'email' => 'bagashaahlah@gmail.com',
            'password' => Hash::make('password'),

            'identity_number' => '199103152019021004',
            'phone' => '081234567891',
            'institution' => 'Kantor Wilayah Direktorat Jenderal Pemasyarakatan Jawa Barat',

            'role' => 'staff',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User / Masyarakat
        User::create([
            'name' => 'M Herdi Al-Fachri',
            'email' => 'alfachri75@gmail.com',
            'password' => Hash::make('password'),

            'identity_number' => '21305110100',
            'phone' => '081234567892',
            'institution' => 'Universitas Indonesia',

            'role' => 'user',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
