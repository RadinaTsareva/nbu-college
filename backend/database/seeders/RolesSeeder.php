<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'student',
            'rector',
            'director',
            'lecturer',
            'admin'
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert(
                [
                    'name' => strtolower($role),
                ]
            );
        }
    }
}
