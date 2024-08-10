<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch course IDs from the courses table
        $courses = DB::table('courses')->pluck('id', 'course_name');

        // Fetch subject IDs from the subjects table
        $subjects = DB::table('subjects')->pluck('id', 'subject_name');

        // Define course-subject relationships
         $insertData=([
            // Computer Science Department
            ['course_id' => $courses['Introduction to Programming'], 'subject_id' => $subjects['Basic Programming Concepts']],
            ['course_id' => $courses['Introduction to Programming'], 'subject_id' => $subjects['Data Structures and Algorithms']],
            ['course_id' => $courses['Database Management Systems'], 'subject_id' => $subjects['Database Systems']],
            ['course_id' => $courses['Software Engineering'], 'subject_id' => $subjects['Software Engineering']],

            // Mechanical Engineering Department
            ['course_id' => $courses['Thermodynamics'], 'subject_id' => $subjects['Thermodynamics']],
            ['course_id' => $courses['Fluid Mechanics'], 'subject_id' => $subjects['Fluid Mechanics']],
            ['course_id' => $courses['Heat Transfer'], 'subject_id' => $subjects['Heat Transfer']],
            ['course_id' => $courses['Machine Design'], 'subject_id' => $subjects['Machine Design']],

            // Civil Engineering Department
            ['course_id' => $courses['Structural Analysis'], 'subject_id' => $subjects['Structural Analysis']],
            ['course_id' => $courses['Geotechnical Engineering'], 'subject_id' => $subjects['Geotechnical Engineering']],
            ['course_id' => $courses['Environmental Engineering'], 'subject_id' => $subjects['Environmental Impact Assessment']],
            ['course_id' => $courses['Construction Management'], 'subject_id' => $subjects['Construction Management']],

            // Electrical Engineering Department
            ['course_id' => $courses['Circuit Theory'], 'subject_id' => $subjects['Circuit Theory']],
            ['course_id' => $courses['Electromagnetic Fields'], 'subject_id' => $subjects['Electromagnetic Fields']],
            ['course_id' => $courses['Digital Electronics'], 'subject_id' => $subjects['Digital Electronics']],
            ['course_id' => $courses['Control Systems'], 'subject_id' => $subjects['Control Systems']],

            // Electronics and Communication Department
            ['course_id' => $courses['Analog Electronics'], 'subject_id' => $subjects['Analog Electronics']],
            ['course_id' => $courses['Digital Communication Systems'], 'subject_id' => $subjects['Digital Communication']],
            ['course_id' => $courses['Microprocessors and Microcontrollers'], 'subject_id' => $subjects['Microprocessors']],
            ['course_id' => $courses['Communication Networks'], 'subject_id' => $subjects['Electronics Circuits']],

            // Chemical Engineering Department
            ['course_id' => $courses['Chemical Reaction Engineering'], 'subject_id' => $subjects['Chemical Reaction Engineering']],
            ['course_id' => $courses['Process Dynamics and Control'], 'subject_id' => $subjects['Process Dynamics and Control']],
            ['course_id' => $courses['Biochemical Engineering'], 'subject_id' => $subjects['Biochemical Engineering']],
            ['course_id' => $courses['Chemical Process Safety'], 'subject_id' => $subjects['Chemical Process Design']],

            // Biotechnology Department
            ['course_id' => $courses['Genetic Engineering'], 'subject_id' => $subjects['Genetic Engineering']],
            ['course_id' => $courses['Bioprocess Engineering'], 'subject_id' => $subjects['Biochemical Engineering']],
            ['course_id' => $courses['Molecular Biology'], 'subject_id' => $subjects['Microbiology']],
            ['course_id' => $courses['Bioinformatics'], 'subject_id' => $subjects['Bioprocess Technology']],

            // Information Technology Department
            ['course_id' => $courses['Web Development'], 'subject_id' => $subjects['Web Development']],
            ['course_id' => $courses['Network Security'], 'subject_id' => $subjects['Network Security']],
            ['course_id' => $courses['Cloud Computing'], 'subject_id' => $subjects['Cloud Computing']],
            ['course_id' => $courses['Software Development Life Cycle'], 'subject_id' => $subjects['Software Development Life Cycle']],

            // Applied Mathematics Department
            ['course_id' => $courses['Advanced Calculus'], 'subject_id' => $subjects['Advanced Calculus']],
            ['course_id' => $courses['Differential Equations'], 'subject_id' => $subjects['Differential Equations']],
            ['course_id' => $courses['Linear Algebra'], 'subject_id' => $subjects['Linear Algebra']],
            ['course_id' => $courses['Probability and Statistics'], 'subject_id' => $subjects['Probability and Statistics']],

            // Physics Department
            ['course_id' => $courses['Quantum Mechanics'], 'subject_id' => $subjects['Quantum Mechanics']],
            ['course_id' => $courses['Thermodynamics'], 'subject_id' => $subjects['Thermodynamics']],
            ['course_id' => $courses['Electromagnetism'], 'subject_id' => $subjects['Electromagnetism']],
            ['course_id' => $courses['Optics'], 'subject_id' => $subjects['Optics']],

            // Chemistry Department
            ['course_id' => $courses['Organic Chemistry'], 'subject_id' => $subjects['Organic Chemistry']],
            ['course_id' => $courses['Inorganic Chemistry'], 'subject_id' => $subjects['Inorganic Chemistry']],
            ['course_id' => $courses['Physical Chemistry'], 'subject_id' => $subjects['Physical Chemistry']],
            ['course_id' => $courses['Analytical Chemistry'], 'subject_id' => $subjects['Analytical Chemistry']],

            // Environmental Engineering Department
            ['course_id' => $courses['Environmental Impact Assessment'], 'subject_id' => $subjects['Environmental Impact Assessment']],
            ['course_id' => $courses['Water Resources Management'], 'subject_id' => $subjects['Water Resources Management']],
            ['course_id' => $courses['Waste Management'], 'subject_id' => $subjects['Waste Management']],
            ['course_id' => $courses['Sustainable Development'], 'subject_id' => $subjects['Sustainable Development']],

            // Architecture Department
            ['course_id' => $courses['Architectural Design'], 'subject_id' => $subjects['Architectural Design']],
            ['course_id' => $courses['Urban Planning'], 'subject_id' => $subjects['Urban Planning']],
            ['course_id' => $courses['Building Construction'], 'subject_id' => $subjects['Building Construction']],
            ['course_id' => $courses['Historic Preservation'], 'subject_id' => $subjects['History of Architecture']],

            // Management Studies Department
            ['course_id' => $courses['Financial Management'], 'subject_id' => $subjects['Financial Management']],
            ['course_id' => $courses['Marketing Management'], 'subject_id' => $subjects['Marketing Management']],
            ['course_id' => $courses['Human Resource Management'], 'subject_id' => $subjects['Human Resource Management']],
            ['course_id' => $courses['Operations Management'], 'subject_id' => $subjects['Operations Management']],

            // Economics Department
            ['course_id' => $courses['Microeconomics'], 'subject_id' => $subjects['Microeconomics']],
            ['course_id' => $courses['Macroeconomics'], 'subject_id' => $subjects['Macroeconomics']],
            ['course_id' => $courses['International Economics'], 'subject_id' => $subjects['International Economics']],
            ['course_id' => $courses['Economic Policy'], 'subject_id' => $subjects['Economic Policy']],
        ]);

        foreach ($insertData as $data) {
            // Check if the entry already exists
            $exists = DB::table('course_subject')
                ->where('course_id', $data['course_id'])
                ->where('subject_id', $data['subject_id'])
                ->exists();
    
            // Insert only if it does not exist
            if (!$exists) {
                DB::table('course_subject')->insert($data);
            }
    }
}
}
