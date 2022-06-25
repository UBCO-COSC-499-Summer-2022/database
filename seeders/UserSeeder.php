<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // Empty Tables before Seeding
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        // create role
        $role = new Roles;
        $role->role = 'Undergraduate';
        $role->num_monthly_bookings = 8;
        $role->frequency = 8;
        $role->save();

        // create role
        $role = new Roles;
        $role->role = 'faculty';
        $role->num_monthly_bookings = 12;
        $role->frequency = 10;
        $role->save();

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
