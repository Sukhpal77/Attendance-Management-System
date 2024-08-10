<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('results')->insert([
            // Semester 1 results
            ['student_id' => '24BT10042', 'subject_id' => 1, 'course_id' => 8, 'semester' => 1, 'credits' => 3, 'grade' => 'A'],
            ['student_id' => '24BT10042', 'subject_id' => 2, 'course_id' => 8, 'semester' => 1, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24CSE10043', 'subject_id' => 3, 'course_id' => 3, 'semester' => 1, 'credits' => 4, 'grade' => 'C'],
            ['student_id' => '24CSE10043', 'subject_id' => 4, 'course_id' => 3, 'semester' => 1, 'credits' => 4, 'grade' => 'A'],
            ['student_id' => '24ME10044', 'subject_id' => 5, 'course_id' => 4, 'semester' => 1, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24ME10044', 'subject_id' => 6, 'course_id' => 4, 'semester' => 1, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24CE10045', 'subject_id' => 7, 'course_id' => 5, 'semester' => 1, 'credits' => 4, 'grade' => 'A'],
            ['student_id' => '24CE10045', 'subject_id' => 8, 'course_id' => 5, 'semester' => 1, 'credits' => 4, 'grade' => 'C'],
            ['student_id' => '24EE10046', 'subject_id' => 9, 'course_id' => 6, 'semester' => 1, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24EE10046', 'subject_id' => 10, 'course_id' => 6, 'semester' => 1, 'credits' => 3, 'grade' => 'A'],
        
            // Semester 2 results
            ['student_id' => '24BT10042', 'subject_id' => 11, 'course_id' => 8, 'semester' => 2, 'credits' => 4, 'grade' => 'B'],
            ['student_id' => '24BT10042', 'subject_id' => 12, 'course_id' => 8, 'semester' => 2, 'credits' => 4, 'grade' => 'A'],
            ['student_id' => '24CSE10043', 'subject_id' => 13, 'course_id' => 3, 'semester' => 2, 'credits' => 3, 'grade' => 'C'],
            ['student_id' => '24CSE10043', 'subject_id' => 14, 'course_id' => 3, 'semester' => 2, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24ME10044', 'subject_id' => 15, 'course_id' => 4, 'semester' => 2, 'credits' => 4, 'grade' => 'A'],
            ['student_id' => '24ME10044', 'subject_id' => 16, 'course_id' => 4, 'semester' => 2, 'credits' => 4, 'grade' => 'C'],
            ['student_id' => '24CE10045', 'subject_id' => 17, 'course_id' => 5, 'semester' => 2, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24CE10045', 'subject_id' => 18, 'course_id' => 5, 'semester' => 2, 'credits' => 3, 'grade' => 'A'],
            ['student_id' => '24EE10046', 'subject_id' => 19, 'course_id' => 6, 'semester' => 2, 'credits' => 4, 'grade' => 'B'],
            ['student_id' => '24EE10046', 'subject_id' => 20, 'course_id' => 6, 'semester' => 2, 'credits' => 4, 'grade' => 'C'],
        
            // Additional records
            ['student_id' => '24IT10047', 'subject_id' => 21, 'course_id' => 7, 'semester' => 1, 'credits' => 3, 'grade' => 'A'],
            ['student_id' => '24IT10047', 'subject_id' => 22, 'course_id' => 7, 'semester' => 1, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24BT10048', 'subject_id' => 23, 'course_id' => 8, 'semester' => 1, 'credits' => 4, 'grade' => 'C'],
            ['student_id' => '24BT10048', 'subject_id' => 24, 'course_id' => 8, 'semester' => 1, 'credits' => 4, 'grade' => 'A'],
            ['student_id' => '24CSE10049', 'subject_id' => 25, 'course_id' => 3, 'semester' => 1, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24CSE10049', 'subject_id' => 26, 'course_id' => 3, 'semester' => 1, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24ME10050', 'subject_id' => 27, 'course_id' => 4, 'semester' => 1, 'credits' => 4, 'grade' => 'A'],
            ['student_id' => '24ME10050', 'subject_id' => 28, 'course_id' => 4, 'semester' => 1, 'credits' => 4, 'grade' => 'C'],
        
            // Semester 2 results
            ['student_id' => '24IT10047', 'subject_id' => 29, 'course_id' => 7, 'semester' => 2, 'credits' => 3, 'grade' => 'C'],
            ['student_id' => '24IT10047', 'subject_id' => 30, 'course_id' => 7, 'semester' => 2, 'credits' => 3, 'grade' => 'A'],
            ['student_id' => '24BT10048', 'subject_id' => 31, 'course_id' => 8, 'semester' => 2, 'credits' => 4, 'grade' => 'B'],
            ['student_id' => '24BT10048', 'subject_id' => 32, 'course_id' => 8, 'semester' => 2, 'credits' => 4, 'grade' => 'A'],
            ['student_id' => '24CSE10049', 'subject_id' => 33, 'course_id' => 3, 'semester' => 2, 'credits' => 3, 'grade' => 'A'],
            ['student_id' => '24CSE10049', 'subject_id' => 34, 'course_id' => 3, 'semester' => 2, 'credits' => 3, 'grade' => 'B'],
            ['student_id' => '24ME10050', 'subject_id' => 35, 'course_id' => 4, 'semester' => 2, 'credits' => 4, 'grade' => 'C'],
            ['student_id' => '24ME10050', 'subject_id' => 36, 'course_id' => 4, 'semester' => 2, 'credits' => 4, 'grade' => 'A']
        ]);
    }
}
