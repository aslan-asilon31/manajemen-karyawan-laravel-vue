<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterData\DepartmentMaster;


class DepartmentMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentMaster::create([
            'name'	=> 'Executive Leadership Team',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Administrative Section',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'HR',
            'desc'	=> 'Human Resources',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Finance and Accounting',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Operations',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Marketing',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Sales',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'IT',
            'desc'	=> 'Information Technology',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Legal and Compliance',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'R&D',
            'desc'	=> 'Research and Development',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Customer Success',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Corporate Communications',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Strategy and Planning',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'PMO',
            'desc'	=> 'Project Management Office',
        ]);
        DepartmentMaster::create([
            'name'	=> 'Quality Assurance and Compliance',
            'desc'	=> '',
        ]);
        DepartmentMaster::create([
            'name'	=> 'CSR',
            'desc'	=> 'Corporate Social Responsibility',
        ]);
    }
}
