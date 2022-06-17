<?php

// The namespace of this UserSeeder is namespace Database\Seeders;
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin Account - enter the info for you admin account
        $admin = User::create([
            'name' => 'Suyash Admin',
            'email' => 'suyash@ubc.ca',
            'password' => Hash::make('password'), /*default local password is "password" */
            'is_admin' => TRUE,
        ]);

        // User Account - enter the info for you user account
        $user = User::create([
            'name' => 'Suyash User',
            'email' => 'suyash@gmail.com',
            'password' => Hash::make('password'), /*default local password is "password" */
        ]);
    }
}
