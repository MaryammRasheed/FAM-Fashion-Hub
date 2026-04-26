<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        if (Vendor::count() > 0) {
            $this->command->info('Vendors already exist. Skipping...');
            return;
        }

        // Create a demo vendor user
        $vendorUser = User::firstOrCreate(
            ['email' => 'vendor@famfashion.com'],
            [
                'name'     => 'Demo Vendor',
                'email'    => 'vendor@famfashion.com',
                'password' => Hash::make('password'),
                'role'     => 'vendor',
            ]
        );

        Vendor::firstOrCreate(
            ['user_id' => $vendorUser->id],
            [
                'user_id'       => $vendorUser->id,
                'business_name' => 'FAM Fashion Store',
                'phone'         => '03001234567',
                'address'       => 'Lahore, Pakistan',
                'status'        => 'approved',
                'description'   => 'Official FAM Fashion Hub vendor',
            ]
        );

        $this->command->info('✅ Demo vendor created: vendor@famfashion.com / password');
    }
}
