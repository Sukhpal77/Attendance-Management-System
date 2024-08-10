<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exams')->insert([
            // Batch 3
            [
                'exam_date' => '2024-12-10',
                'exam_time' => '10:00:00',
                'batch_id' => 3,
                'subject_id' => 1,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-01-10',
                'exam_time' => '11:00:00',
                'batch_id' => 3,
                'subject_id' => 2,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-10',
                'exam_time' => '12:00:00',
                'batch_id' => 3,
                'subject_id' => 3,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-10',
                'exam_time' => '01:00:00',
                'batch_id' => 3,
                'subject_id' => 4,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
        
            // Batch 4
            [
                'exam_date' => '2024-12-15',
                'exam_time' => '10:00:00',
                'batch_id' => 4,
                'subject_id' => 5,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-01-15',
                'exam_time' => '11:00:00',
                'batch_id' => 4,
                'subject_id' => 6,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-15',
                'exam_time' => '12:00:00',
                'batch_id' => 4,
                'subject_id' => 7,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-15',
                'exam_time' => '01:00:00',
                'batch_id' => 4,
                'subject_id' => 8,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
        
            // Batch 5
            [
                'exam_date' => '2024-12-20',
                'exam_time' => '10:00:00',
                'batch_id' => 5,
                'subject_id' => 9,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-01-20',
                'exam_time' => '11:00:00',
                'batch_id' => 5,
                'subject_id' => 10,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-20',
                'exam_time' => '12:00:00',
                'batch_id' => 5,
                'subject_id' => 11,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-20',
                'exam_time' => '01:00:00',
                'batch_id' => 5,
                'subject_id' => 12,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
        
            // Batch 6
            [
                'exam_date' => '2024-12-25',
                'exam_time' => '10:00:00',
                'batch_id' => 6,
                'subject_id' => 13,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-01-25',
                'exam_time' => '11:00:00',
                'batch_id' => 6,
                'subject_id' => 14,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-25',
                'exam_time' => '12:00:00',
                'batch_id' => 6,
                'subject_id' => 15,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-25',
                'exam_time' => '01:00:00',
                'batch_id' => 6,
                'subject_id' => 16,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
        
            // Batch 7
            [
                'exam_date' => '2025-01-05',
                'exam_time' => '10:00:00',
                'batch_id' => 7,
                'subject_id' => 17,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-05',
                'exam_time' => '11:00:00',
                'batch_id' => 7,
                'subject_id' => 18,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-05',
                'exam_time' => '12:00:00',
                'batch_id' => 7,
                'subject_id' => 19,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-04-05',
                'exam_time' => '01:00:00',
                'batch_id' => 7,
                'subject_id' => 20,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
        
            // Batch 8
            [
                'exam_date' => '2025-01-10',
                'exam_time' => '10:00:00',
                'batch_id' => 8,
                'subject_id' => 1,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-10',
                'exam_time' => '11:00:00',
                'batch_id' => 8,
                'subject_id' => 2,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-10',
                'exam_time' => '12:00:00',
                'batch_id' => 8,
                'subject_id' => 3,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-04-10',
                'exam_time' => '01:00:00',
                'batch_id' => 8,
                'subject_id' => 4,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
        
            // Batch 9
            [
                'exam_date' => '2025-01-15',
                'exam_time' => '10:00:00',
                'batch_id' => 9,
                'subject_id' => 5,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-15',
                'exam_time' => '11:00:00',
                'batch_id' => 9,
                'subject_id' => 6,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-15',
                'exam_time' => '12:00:00',
                'batch_id' => 9,
                'subject_id' => 7,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-04-15',
                'exam_time' => '01:00:00',
                'batch_id' => 9,
                'subject_id' => 8,
                'group' => 'A',
                'exam_type' => 'Midterm'
            ],
        
            // Batch 10
            [
                'exam_date' => '2025-01-20',
                'exam_time' => '10:00:00',
                'batch_id' => 10,
                'subject_id' => 9,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-02-20',
                'exam_time' => '11:00:00',
                'batch_id' => 10,
                'subject_id' => 10,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-03-20',
                'exam_time' => '12:00:00',
                'batch_id' => 10,
                'subject_id' => 11,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
            [
                'exam_date' => '2025-04-20',
                'exam_time' => '01:00:00',
                'batch_id' => 10,
                'subject_id' => 12,
                'group' => 'B',
                'exam_type' => 'Midterm'
            ],
        ]);
        
    }
}
