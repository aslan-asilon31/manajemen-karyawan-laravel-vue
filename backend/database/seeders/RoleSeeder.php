<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterData\RoleMaster;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleMaster::create([
            'roles_id'	=> 1,
            'name'	=> 'superadmin',
        ]);
        RoleMaster::create([
            'roles_id'	=> 2,
            'name'	=> 'admin',
        ]);
        RoleMaster::create([
            'roles_id'	=> 3,
            'name'	=> 'manager',
        ]);
        RoleMaster::create([
            'roles_id'	=> 4,
            'name'	=> 'supervisor',
        ]);
        RoleMaster::create([
            'roles_id'	=> 5,
            'name'	=> 'employee',
        ]);
    }
}
