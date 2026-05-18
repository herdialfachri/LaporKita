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
            'division_id' => 1,
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),

            'identity_number' => '198505202010121003',
            'phone' => '081234567890',
            'institution' => 'Kantor Wilayah Direktorat Jenderal Pemasyarakatan Jawa Barat',

            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Staff
        User::create([
            'division_id' => 2,
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),

            'identity_number' => '199103152019021004',
            'phone' => '081234567891',
            'institution' => 'Kantor Wilayah Direktorat Jenderal Pemasyarakatan Jawa Barat',

            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Admin 2
        User::create([
            'name' => 'Staff 1',
            'email' => 'staff1@gmail.com',
            'password' => Hash::make('password'),

            'identity_number' => '198505202010121005',
            'phone' => '081234567893',
            'institution' => 'Kantor Wilayah Direktorat Jenderal Pemasyarakatan Jawa Barat',

            'role' => 'staff',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Staff 2
        User::create([
            'name' => 'Staff 2',
            'email' => 'staff2@gmail.com',
            'password' => Hash::make('password'),

            'identity_number' => '199103152019021006',
            'phone' => '081234567894',
            'institution' => 'Kantor Wilayah Direktorat Jenderal Pemasyarakatan Jawa Barat',

            'role' => 'staff',
            'status' => 'active',
            'email_verified_at' => now(),
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
