<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'name' => 'Computer Science',
                'description' => 'Department of Computer Science and Engineering',
            ],
            [
                'name' => 'Mechanical Engineering',
                'description' => 'Department of Mechanical Engineering',
            ],
            [
                'name' => 'Civil Engineering',
                'description' => 'Department of Civil Engineering',
            ],
            [
                'name' => 'Electrical Engineering',
                'description' => 'Department of Electrical Engineering',
            ],
            [
                'name' => 'Electronics and Communication',
                'description' => 'Department of Electronics and Communication Engineering',
            ],
            [
                'name' => 'Chemical Engineering',
                'description' => 'Department of Chemical Engineering',
            ],
            [
                'name' => 'Biotechnology',
                'description' => 'Department of Biotechnology',
            ],
            [
                'name' => 'Information Technology',
                'description' => 'Department of Information Technology',
            ],
            [
                'name' => 'Applied Mathematics',
                'description' => 'Department of Applied Mathematics',
            ],
            [
                'name' => 'Physics',
                'description' => 'Department of Physics',
            ],
            [
                'name' => 'Chemistry',
                'description' => 'Department of Chemistry',
            ],
            [
                'name' => 'Environmental Engineering',
                'description' => 'Department of Environmental Engineering',
            ],
            [
                'name' => 'Architecture',
                'description' => 'Department of Architecture',
            ],
            [
                'name' => 'Management Studies',
                'description' => 'Department of Management Studies',
            ],
            [
                'name' => 'Economics',
                'description' => 'Department of Economics',
            ],
            
        ]);
    }
}
