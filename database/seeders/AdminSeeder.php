<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'contact@gestimmo-presta.fr'],
            [
                'name' => 'Admin GEST\'IMMO',
                'password' => Hash::make('ByroN.GESTIMMO2005'),
            ]
        );
    }
}
