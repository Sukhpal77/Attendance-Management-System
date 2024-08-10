<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Fetch course IDs from the courses table
        $courses = DB::table('courses')->pluck('id', 'course_name');

        // Insert data into the batches table
        DB::table('batches')->insert([
            // Batches for Introduction to Programming
            [
                'batch_name' => 'CS101 - Batch A',
                'course_id' => $courses['Introduction to Programming'],
            ],
            [
                'batch_name' => 'CS101 - Batch B',
                'course_id' => $courses['Introduction to Programming'],
            ],

            // Batches for Data Structures and Algorithms
            [
                'batch_name' => 'CS102 - Batch A',
                'course_id' => $courses['Data Structures and Algorithms'],
            ],
            [
                'batch_name' => 'CS102 - Batch B',
                'course_id' => $courses['Data Structures and Algorithms'],
            ],

            // Batches for Database Management Systems
            [
                'batch_name' => 'CS103 - Batch A',
                'course_id' => $courses['Database Management Systems'],
            ],
            [
                'batch_name' => 'CS103 - Batch B',
                'course_id' => $courses['Database Management Systems'],
            ],

            // Batches for Software Engineering
            [
                'batch_name' => 'CS104 - Batch A',
                'course_id' => $courses['Software Engineering'],
            ],
            [
                'batch_name' => 'CS104 - Batch B',
                'course_id' => $courses['Software Engineering'],
            ],

            // Batches for Thermodynamics
            [
                'batch_name' => 'ME101 - Batch A',
                'course_id' => $courses['Thermodynamics'],
            ],
            [
                'batch_name' => 'ME101 - Batch B',
                'course_id' => $courses['Thermodynamics'],
            ],

            // Batches for Fluid Mechanics
            [
                'batch_name' => 'ME102 - Batch A',
                'course_id' => $courses['Fluid Mechanics'],
            ],
            [
                'batch_name' => 'ME102 - Batch B',
                'course_id' => $courses['Fluid Mechanics'],
            ],

            // Batches for Heat Transfer
            [
                'batch_name' => 'ME103 - Batch A',
                'course_id' => $courses['Heat Transfer'],
            ],
            [
                'batch_name' => 'ME103 - Batch B',
                'course_id' => $courses['Heat Transfer'],
            ],

            // Batches for Machine Design
            [
                'batch_name' => 'ME104 - Batch A',
                'course_id' => $courses['Machine Design'],
            ],
            [
                'batch_name' => 'ME104 - Batch B',
                'course_id' => $courses['Machine Design'],
            ],

            // Batches for Structural Analysis
            [
                'batch_name' => 'CE101 - Batch A',
                'course_id' => $courses['Structural Analysis'],
            ],
            [
                'batch_name' => 'CE101 - Batch B',
                'course_id' => $courses['Structural Analysis'],
            ],

            // Batches for Geotechnical Engineering
            [
                'batch_name' => 'CE102 - Batch A',
                'course_id' => $courses['Geotechnical Engineering'],
            ],
            [
                'batch_name' => 'CE102 - Batch B',
                'course_id' => $courses['Geotechnical Engineering'],
            ],

            // Batches for Environmental Engineering
            [
                'batch_name' => 'CE103 - Batch A',
                'course_id' => $courses['Environmental Engineering'],
            ],
            [
                'batch_name' => 'CE103 - Batch B',
                'course_id' => $courses['Environmental Engineering'],
            ],

            // Batches for Construction Management
            [
                'batch_name' => 'CE104 - Batch A',
                'course_id' => $courses['Construction Management'],
            ],
            [
                'batch_name' => 'CE104 - Batch B',
                'course_id' => $courses['Construction Management'],
            ],

            // Batches for Circuit Theory
            [
                'batch_name' => 'EE101 - Batch A',
                'course_id' => $courses['Circuit Theory'],
            ],
            [
                'batch_name' => 'EE101 - Batch B',
                'course_id' => $courses['Circuit Theory'],
            ],

            // Batches for Electromagnetic Fields
            [
                'batch_name' => 'EE102 - Batch A',
                'course_id' => $courses['Electromagnetic Fields'],
            ],
            [
                'batch_name' => 'EE102 - Batch B',
                'course_id' => $courses['Electromagnetic Fields'],
            ],

            // Batches for Digital Electronics
            [
                'batch_name' => 'EE103 - Batch A',
                'course_id' => $courses['Digital Electronics'],
            ],
            [
                'batch_name' => 'EE103 - Batch B',
                'course_id' => $courses['Digital Electronics'],
            ],

            // Batches for Control Systems
            [
                'batch_name' => 'EE104 - Batch A',
                'course_id' => $courses['Control Systems'],
            ],
            [
                'batch_name' => 'EE104 - Batch B',
                'course_id' => $courses['Control Systems'],
            ],

            // Batches for Analog Electronics
            [
                'batch_name' => 'EC101 - Batch A',
                'course_id' => $courses['Analog Electronics'],
            ],
            [
                'batch_name' => 'EC101 - Batch B',
                'course_id' => $courses['Analog Electronics'],
            ],

            // Batches for Digital Communication Systems
            [
                'batch_name' => 'EC102 - Batch A',
                'course_id' => $courses['Digital Communication Systems'],
            ],
            [
                'batch_name' => 'EC102 - Batch B',
                'course_id' => $courses['Digital Communication Systems'],
            ],

            // Batches for Microprocessors and Microcontrollers
            [
                'batch_name' => 'EC103 - Batch A',
                'course_id' => $courses['Microprocessors and Microcontrollers'],
            ],
            [
                'batch_name' => 'EC103 - Batch B',
                'course_id' => $courses['Microprocessors and Microcontrollers'],
            ],

            // Batches for Communication Networks
            [
                'batch_name' => 'EC104 - Batch A',
                'course_id' => $courses['Communication Networks'],
            ],
            [
                'batch_name' => 'EC104 - Batch B',
                'course_id' => $courses['Communication Networks'],
            ],

            // Batches for Chemical Reaction Engineering
            [
                'batch_name' => 'CHE101 - Batch A',
                'course_id' => $courses['Chemical Reaction Engineering'],
            ],
            [
                'batch_name' => 'CHE101 - Batch B',
                'course_id' => $courses['Chemical Reaction Engineering'],
            ],

            // Batches for Process Dynamics and Control
            [
                'batch_name' => 'CHE102 - Batch A',
                'course_id' => $courses['Process Dynamics and Control'],
            ],
            [
                'batch_name' => 'CHE102 - Batch B',
                'course_id' => $courses['Process Dynamics and Control'],
            ],

            // Batches for Biochemical Engineering
            [
                'batch_name' => 'CHE103 - Batch A',
                'course_id' => $courses['Biochemical Engineering'],
            ],
            [
                'batch_name' => 'CHE103 - Batch B',
                'course_id' => $courses['Biochemical Engineering'],
            ],

            // Batches for Chemical Process Safety
            [
                'batch_name' => 'CHE104 - Batch A',
                'course_id' => $courses['Chemical Process Safety'],
            ],
            [
                'batch_name' => 'CHE104 - Batch B',
                'course_id' => $courses['Chemical Process Safety'],
            ],

            // Batches for Genetic Engineering
            [
                'batch_name' => 'BIO101 - Batch A',
                'course_id' => $courses['Genetic Engineering'],
            ],
            [
                'batch_name' => 'BIO101 - Batch B',
                'course_id' => $courses['Genetic Engineering'],
            ],

            // Batches for Bioprocess Engineering
            [
                'batch_name' => 'BIO102 - Batch A',
                'course_id' => $courses['Bioprocess Engineering'],
            ],
            [
                'batch_name' => 'BIO102 - Batch B',
                'course_id' => $courses['Bioprocess Engineering'],
            ],

            // Batches for Molecular Biology
            [
                'batch_name' => 'BIO103 - Batch A',
                'course_id' => $courses['Molecular Biology'],
            ],
            [
                'batch_name' => 'BIO103 - Batch B',
                'course_id' => $courses['Molecular Biology'],
            ],

            // Batches for Bioinformatics
            [
                'batch_name' => 'BIO104 - Batch A',
                'course_id' => $courses['Bioinformatics'],
            ],
            [
                'batch_name' => 'BIO104 - Batch B',
                'course_id' => $courses['Bioinformatics'],
            ],

            // Batches for Web Development
            [
                'batch_name' => 'IT101 - Batch A',
                'course_id' => $courses['Web Development'],
            ],
            [
                'batch_name' => 'IT101 - Batch B',
                'course_id' => $courses['Web Development'],
            ],

            // Batches for Network Security
            [
                'batch_name' => 'IT102 - Batch A',
                'course_id' => $courses['Network Security'],
            ],
            [
                'batch_name' => 'IT102 - Batch B',
                'course_id' => $courses['Network Security'],
            ],

            // Batches for Cloud Computing
            [
                'batch_name' => 'IT103 - Batch A',
                'course_id' => $courses['Cloud Computing'],
            ],
            [
                'batch_name' => 'IT103 - Batch B',
                'course_id' => $courses['Cloud Computing'],
            ],

            // Batches for Software Development Life Cycle
            [
                'batch_name' => 'IT104 - Batch A',
                'course_id' => $courses['Software Development Life Cycle'],
            ],
            [
                'batch_name' => 'IT104 - Batch B',
                'course_id' => $courses['Software Development Life Cycle'],
            ],

            // Batches for Advanced Calculus
            [
                'batch_name' => 'AM101 - Batch A',
                'course_id' => $courses['Advanced Calculus'],
            ],
            [
                'batch_name' => 'AM101 - Batch B',
                'course_id' => $courses['Advanced Calculus'],
            ],

            // Batches for Differential Equations
            [
                'batch_name' => 'AM102 - Batch A',
                'course_id' => $courses['Differential Equations'],
            ],
            [
                'batch_name' => 'AM102 - Batch B',
                'course_id' => $courses['Differential Equations'],
            ],

            // Batches for Linear Algebra
            [
                'batch_name' => 'AM103 - Batch A',
                'course_id' => $courses['Linear Algebra'],
            ],
            [
                'batch_name' => 'AM103 - Batch B',
                'course_id' => $courses['Linear Algebra'],
            ],

            // Batches for Probability and Statistics
            [
                'batch_name' => 'AM104 - Batch A',
                'course_id' => $courses['Probability and Statistics'],
            ],
            [
                'batch_name' => 'AM104 - Batch B',
                'course_id' => $courses['Probability and Statistics'],
            ],

            // Batches for Quantum Mechanics
            [
                'batch_name' => 'PH101 - Batch A',
                'course_id' => $courses['Quantum Mechanics'],
            ],
            [
                'batch_name' => 'PH101 - Batch B',
                'course_id' => $courses['Quantum Mechanics'],
            ],

            // Batches for Thermodynamics
            [
                'batch_name' => 'PH102 - Batch A',
                'course_id' => $courses['Thermodynamics'],
            ],
            [
                'batch_name' => 'PH102 - Batch B',
                'course_id' => $courses['Thermodynamics'],
            ],

            // Batches for Electromagnetism
            [
                'batch_name' => 'PH103 - Batch A',
                'course_id' => $courses['Electromagnetism'],
            ],
            [
                'batch_name' => 'PH103 - Batch B',
                'course_id' => $courses['Electromagnetism'],
            ],

            // Batches for Optics
            [
                'batch_name' => 'PH104 - Batch A',
                'course_id' => $courses['Optics'],
            ],
            [
                'batch_name' => 'PH104 - Batch B',
                'course_id' => $courses['Optics'],
            ],

            // Batches for Organic Chemistry
            [
                'batch_name' => 'CH101 - Batch A',
                'course_id' => $courses['Organic Chemistry'],
            ],
            [
                'batch_name' => 'CH101 - Batch B',
                'course_id' => $courses['Organic Chemistry'],
            ],

            // Batches for Inorganic Chemistry
            [
                'batch_name' => 'CH102 - Batch A',
                'course_id' => $courses['Inorganic Chemistry'],
            ],
            [
                'batch_name' => 'CH102 - Batch B',
                'course_id' => $courses['Inorganic Chemistry'],
            ],

            // Batches for Physical Chemistry
            [
                'batch_name' => 'CH103 - Batch A',
                'course_id' => $courses['Physical Chemistry'],
            ],
            [
                'batch_name' => 'CH103 - Batch B',
                'course_id' => $courses['Physical Chemistry'],
            ],

            // Batches for Analytical Chemistry
            [
                'batch_name' => 'CH104 - Batch A',
                'course_id' => $courses['Analytical Chemistry'],
            ],
            [
                'batch_name' => 'CH104 - Batch B',
                'course_id' => $courses['Analytical Chemistry'],
            ],

            // Batches for Environmental Impact Assessment
            [
                'batch_name' => 'EN101 - Batch A',
                'course_id' => $courses['Environmental Impact Assessment'],
            ],
            [
                'batch_name' => 'EN101 - Batch B',
                'course_id' => $courses['Environmental Impact Assessment'],
            ],

            // Batches for Water Resources Management
            [
                'batch_name' => 'EN102 - Batch A',
                'course_id' => $courses['Water Resources Management'],
            ],
            [
                'batch_name' => 'EN102 - Batch B',
                'course_id' => $courses['Water Resources Management'],
            ],

            // Batches for Waste Management
            [
                'batch_name' => 'EN103 - Batch A',
                'course_id' => $courses['Waste Management'],
            ],
            [
                'batch_name' => 'EN103 - Batch B',
                'course_id' => $courses['Waste Management'],
            ],

            // Batches for Sustainable Development
            [
                'batch_name' => 'EN104 - Batch A',
                'course_id' => $courses['Sustainable Development'],
            ],
            [
                'batch_name' => 'EN104 - Batch B',
                'course_id' => $courses['Sustainable Development'],
            ],

            // Batches for Architectural Design
            [
                'batch_name' => 'AR101 - Batch A',
                'course_id' => $courses['Architectural Design'],
            ],
            [
                'batch_name' => 'AR101 - Batch B',
                'course_id' => $courses['Architectural Design'],
            ],

            // Batches for Urban Planning
            [
                'batch_name' => 'AR102 - Batch A',
                'course_id' => $courses['Urban Planning'],
            ],
            [
                'batch_name' => 'AR102 - Batch B',
                'course_id' => $courses['Urban Planning'],
            ],

            // Batches for Building Construction
            [
                'batch_name' => 'AR103 - Batch A',
                'course_id' => $courses['Building Construction'],
            ],
            [
                'batch_name' => 'AR103 - Batch B',
                'course_id' => $courses['Building Construction'],
            ],

            // Batches for Historic Preservation
            [
                'batch_name' => 'AR104 - Batch A',
                'course_id' => $courses['Historic Preservation'],
            ],
            [
                'batch_name' => 'AR104 - Batch B',
                'course_id' => $courses['Historic Preservation'],
            ],

            // Batches for Financial Management
            [
                'batch_name' => 'MS101 - Batch A',
                'course_id' => $courses['Financial Management'],
            ],
            [
                'batch_name' => 'MS101 - Batch B',
                'course_id' => $courses['Financial Management'],
            ],

            // Batches for Marketing Management
            [
                'batch_name' => 'MS102 - Batch A',
                'course_id' => $courses['Marketing Management'],
            ],
            [
                'batch_name' => 'MS102 - Batch B',
                'course_id' => $courses['Marketing Management'],
            ],

            // Batches for Human Resource Management
            [
                'batch_name' => 'MS103 - Batch A',
                'course_id' => $courses['Human Resource Management'],
            ],
            [
                'batch_name' => 'MS103 - Batch B',
                'course_id' => $courses['Human Resource Management'],
            ],

            // Batches for Operations Management
            [
                'batch_name' => 'MS104 - Batch A',
                'course_id' => $courses['Operations Management'],
            ],
            [
                'batch_name' => 'MS104 - Batch B',
                'course_id' => $courses['Operations Management'],
            ],

            // Batches for Microeconomics
            [
                'batch_name' => 'EC101 - Batch A',
                'course_id' => $courses['Microeconomics'],
            ],
            [
                'batch_name' => 'EC101 - Batch B',
                'course_id' => $courses['Microeconomics'],
            ],

            // Batches for Macroeconomics
            [
                'batch_name' => 'EC102 - Batch A',
                'course_id' => $courses['Macroeconomics'],
            ],
            [
                'batch_name' => 'EC102 - Batch B',
                'course_id' => $courses['Macroeconomics'],
            ],

            // Batches for International Economics
            [
                'batch_name' => 'EC103 - Batch A',
                'course_id' => $courses['International Economics'],
            ],
            [
                'batch_name' => 'EC103 - Batch B',
                'course_id' => $courses['International Economics'],
            ],

            // Batches for Development Economics
    
        ]);
    }
}

    

