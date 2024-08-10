<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            // Computer Science related subjects
            ['subject_name' => 'Basic Programming Concepts'],
            ['subject_name' => 'Data Structures and Algorithms'],
            ['subject_name' => 'Database Systems'],
            ['subject_name' => 'Computer Networks'],
            ['subject_name' => 'Software Engineering'],
            ['subject_name' => 'Cloud Computing'],

            // Mechanical Engineering related subjects
            ['subject_name' => 'Thermodynamics'],
            ['subject_name' => 'Fluid Mechanics'],
            ['subject_name' => 'Heat Transfer'],
            ['subject_name' => 'Mechanics of Materials'],
            ['subject_name' => 'Machine Design'],

            // Civil Engineering related subjects
            ['subject_name' => 'Structural Analysis'],
            ['subject_name' => 'Geotechnical Engineering'],
            ['subject_name' => 'Hydraulics'],
            ['subject_name' => 'Transportation Engineering'],
            ['subject_name' => 'Construction Management'],

            // Electrical Engineering related subjects
            ['subject_name' => 'Circuit Theory'],
            ['subject_name' => 'Electromagnetic Fields'],
            ['subject_name' => 'Control Systems'],
            ['subject_name' => 'Power Systems'],
            ['subject_name' => 'Digital Electronics'],

            // Electronics and Communication related subjects
            ['subject_name' => 'Analog Electronics'],
            ['subject_name' => 'Digital Communication'],
            ['subject_name' => 'Signal Processing'],
            ['subject_name' => 'Microprocessors'],
            ['subject_name' => 'Electronics Circuits'],

            // Chemical Engineering related subjects
            ['subject_name' => 'Chemical Reaction Engineering'],
            ['subject_name' => 'Process Dynamics and Control'],
            ['subject_name' => 'Heat and Mass Transfer'],
            ['subject_name' => 'Chemical Process Design'],
            ['subject_name' => 'Separation Processes'],

            // Biotechnology related subjects
            ['subject_name' => 'Genetic Engineering'],
            ['subject_name' => 'Biochemical Engineering'],
            ['subject_name' => 'Microbiology'],
            ['subject_name' => 'Cell Biology'],
            ['subject_name' => 'Bioprocess Technology'],

            // Information Technology related subjects
            ['subject_name' => 'Web Development'],
            ['subject_name' => 'Database Management Systems'],
            ['subject_name' => 'Network Security'],
            ['subject_name' => 'Operating Systems'],
            ['subject_name' => 'Software Development Life Cycle'],

            // Applied Mathematics related subjects
            ['subject_name' => 'Advanced Calculus'],
            ['subject_name' => 'Differential Equations'],
            ['subject_name' => 'Linear Algebra'],
            ['subject_name' => 'Numerical Analysis'],
            ['subject_name' => 'Probability and Statistics'],

            // Physics related subjects
            ['subject_name' => 'Classical Mechanics'],
            ['subject_name' => 'Quantum Mechanics'],
            ['subject_name' => 'Electromagnetism'],
            ['subject_name' => 'Optics'],
            ['subject_name' => 'Thermodynamics'],

            // Chemistry related subjects
            ['subject_name' => 'Organic Chemistry'],
            ['subject_name' => 'Inorganic Chemistry'],
            ['subject_name' => 'Physical Chemistry'],
            ['subject_name' => 'Analytical Chemistry'],
            ['subject_name' => 'Industrial Chemistry'],

            // Environmental Engineering related subjects
            ['subject_name' => 'Environmental Impact Assessment'],
            ['subject_name' => 'Water Resources Management'],
            ['subject_name' => 'Waste Management'],
            ['subject_name' => 'Air Pollution Control'],
            ['subject_name' => 'Sustainable Development'],

            // Architecture related subjects
            ['subject_name' => 'Architectural Design'],
            ['subject_name' => 'Urban Planning'],
            ['subject_name' => 'Building Construction'],
            ['subject_name' => 'Landscape Architecture'],
            ['subject_name' => 'History of Architecture'],

            // Management Studies related subjects
            ['subject_name' => 'Financial Management'],
            ['subject_name' => 'Marketing Management'],
            ['subject_name' => 'Human Resource Management'],
            ['subject_name' => 'Operations Management'],
            ['subject_name' => 'Strategic Management'],

            // Economics related subjects
            ['subject_name' => 'Microeconomics'],
            ['subject_name' => 'Macroeconomics'],
            ['subject_name' => 'International Economics'],
            ['subject_name' => 'Development Economics'],
            ['subject_name' => 'Econometrics'],
            ['subject_name' => 'Economic Policy'],
        ]);
    }
}
