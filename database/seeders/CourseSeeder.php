<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $departments = DB::table('departments')->pluck('id', 'name');
        DB::table('courses')->insert([
            // Computer Science Department
            [
                'course_name' => 'Introduction to Programming',
                'department_id' => $departments['Computer Science'],
            ],

            [
                'course_name' => 'Engineering Mechanics',
                'department_id' => $departments['Mechanical Engineering'],
            ],
            [
                'course_name' => 'Data Structures and Algorithms',
                'department_id' => $departments['Computer Science'],
            ],
            [
                'course_name' => 'Database Management Systems',
                'department_id' => $departments['Computer Science'],
            ],
            [
                'course_name' => 'Software Engineering',
                'department_id' => $departments['Computer Science'],
            ],

            // Mechanical Engineering Department
            [
                'course_name' => 'Thermodynamics',
                'department_id' => $departments['Mechanical Engineering'],
            ],
            [
                'course_name' => 'Fluid Mechanics',
                'department_id' => $departments['Mechanical Engineering'],
            ],
            [
                'course_name' => 'Heat Transfer',
                'department_id' => $departments['Mechanical Engineering'],
            ],
            [
                'course_name' => 'Machine Design',
                'department_id' => $departments['Mechanical Engineering'],
            ],

            // Civil Engineering Department
            [
                'course_name' => 'Structural Analysis',
                'department_id' => $departments['Civil Engineering'],
            ],
            [
                'course_name' => 'Geotechnical Engineering',
                'department_id' => $departments['Civil Engineering'],
            ],
            [
                'course_name' => 'Environmental Engineering',
                'department_id' => $departments['Civil Engineering'],
            ],
            [
                'course_name' => 'Construction Management',
                'department_id' => $departments['Civil Engineering'],
            ],

            // Electrical Engineering Department
            [
                'course_name' => 'Circuit Theory',
                'department_id' => $departments['Electrical Engineering'],
            ],
            [
                'course_name' => 'Electromagnetic Fields',
                'department_id' => $departments['Electrical Engineering'],
            ],
            [
                'course_name' => 'Digital Electronics',
                'department_id' => $departments['Electrical Engineering'],
            ],
            [
                'course_name' => 'Control Systems',
                'department_id' => $departments['Electrical Engineering'],
            ],

            // Electronics and Communication Department
            [
                'course_name' => 'Analog Electronics',
                'department_id' => $departments['Electronics and Communication'],
            ],
            [
                'course_name' => 'Digital Communication Systems',
                'department_id' => $departments['Electronics and Communication'],
            ],
            [
                'course_name' => 'Microprocessors and Microcontrollers',
                'department_id' => $departments['Electronics and Communication'],
            ],
            [
                'course_name' => 'Communication Networks',
                'department_id' => $departments['Electronics and Communication'],
            ],

            // Chemical Engineering Department
            [
                'course_name' => 'Chemical Reaction Engineering',
                'department_id' => $departments['Chemical Engineering'],
            ],
            [
                'course_name' => 'Process Dynamics and Control',
                'department_id' => $departments['Chemical Engineering'],
            ],
            [
                'course_name' => 'Biochemical Engineering',
                'department_id' => $departments['Chemical Engineering'],
            ],
            [
                'course_name' => 'Chemical Process Safety',
                'department_id' => $departments['Chemical Engineering'],
            ],

            // Biotechnology Department
            [
                'course_name' => 'Genetic Engineering',
                'department_id' => $departments['Biotechnology'],
            ],
            [
                'course_name' => 'Bioprocess Engineering',
                'department_id' => $departments['Biotechnology'],
            ],
            [
                'course_name' => 'Molecular Biology',
                'department_id' => $departments['Biotechnology'],
            ],
            [
                'course_name' => 'Bioinformatics',
                'department_id' => $departments['Biotechnology'],
            ],

            // Information Technology Department
            [
                'course_name' => 'Web Development',
                'department_id' => $departments['Information Technology'],
            ],
            [
                'course_name' => 'Network Security',
                'department_id' => $departments['Information Technology'],
            ],
            [
                'course_name' => 'Cloud Computing',
                'department_id' => $departments['Information Technology'],
            ],
            [
                'course_name' => 'Software Development Life Cycle',
                'department_id' => $departments['Information Technology'],
            ],

            // Applied Mathematics Department
            [
                'course_name' => 'Advanced Calculus',
                'department_id' => $departments['Applied Mathematics'],
            ],
            [
                'course_name' => 'Differential Equations',
                'department_id' => $departments['Applied Mathematics'],
            ],
            [
                'course_name' => 'Linear Algebra',
                'department_id' => $departments['Applied Mathematics'],
            ],
            [
                'course_name' => 'Probability and Statistics',
                'department_id' => $departments['Applied Mathematics'],
            ],

            // Physics Department
            [
                'course_name' => 'Quantum Mechanics',
                'department_id' => $departments['Physics'],
            ],
            [
                'course_name' => 'Thermodynamics',
                'department_id' => $departments['Physics'],
            ],
            [
                'course_name' => 'Electromagnetism',
                'department_id' => $departments['Physics'],
            ],
            [
                'course_name' => 'Optics',
                'department_id' => $departments['Physics'],
            ],

            // Chemistry Department
            [
                'course_name' => 'Organic Chemistry',
                'department_id' => $departments['Chemistry'],
            ],
            [
                'course_name' => 'Inorganic Chemistry',
                'department_id' => $departments['Chemistry'],
            ],
            [
                'course_name' => 'Physical Chemistry',
                'department_id' => $departments['Chemistry'],
            ],
            [
                'course_name' => 'Analytical Chemistry',
                'department_id' => $departments['Chemistry'],
            ],

            // Environmental Engineering Department
            [
                'course_name' => 'Environmental Impact Assessment',
                'department_id' => $departments['Environmental Engineering'],
            ],
            [
                'course_name' => 'Water Resources Management',
                'department_id' => $departments['Environmental Engineering'],
            ],
            [
                'course_name' => 'Waste Management',
                'department_id' => $departments['Environmental Engineering'],
            ],
            [
                'course_name' => 'Sustainable Development',
                'department_id' => $departments['Environmental Engineering'],
            ],

            // Architecture Department
            [
                'course_name' => 'Architectural Design',
                'department_id' => $departments['Architecture'],
            ],
            [
                'course_name' => 'Urban Planning',
                'department_id' => $departments['Architecture'],
            ],
            [
                'course_name' => 'Building Construction',
                'department_id' => $departments['Architecture'],
            ],
            [
                'course_name' => 'Historic Preservation',
                'department_id' => $departments['Architecture'],
            ],

            // Management Studies Department
            [
                'course_name' => 'Financial Management',
                'department_id' => $departments['Management Studies'],
            ],
            [
                'course_name' => 'Marketing Management',
                'department_id' => $departments['Management Studies'],
            ],
            [
                'course_name' => 'Human Resource Management',
                'department_id' => $departments['Management Studies'],
            ],
            [
                'course_name' => 'Operations Management',
                'department_id' => $departments['Management Studies'],
            ],

            // Economics Department
            [
                'course_name' => 'Microeconomics',
                'department_id' => $departments['Economics'],
            ],
            [
                'course_name' => 'Macroeconomics',
                'department_id' => $departments['Economics'],
            ],
            [
                'course_name' => 'International Economics',
                'department_id' => $departments['Economics'],
            ],
            [
                'course_name' => 'Economic Policy',
                'department_id' => $departments['Economics'],
            ],
        ]);
    }
}
