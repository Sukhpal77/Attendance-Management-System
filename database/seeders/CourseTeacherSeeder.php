<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example course IDs
        $courseIds = [
            'Introduction to Programming' => 1,
            'Engineering Mechanics' => 2,
            'Thermodynamics' => 3,
            'Fluid Mechanics' => 4,
            'Heat Transfer' => 5,
            'Mechanics of Materials' => 6,
            'Machine Design' => 7,
            'Computer Networks' => 8,
            'Software Engineering' => 9,
            'Mathematics' => 10
        ];

        // Example teacher IDs based on updated data
        $teacherIds = [
            'John Doe' => '27CS0001',
            'Jane Smith' => '27ME0002',
            'Michael Brown' => '27CE0003',
            'Emily Johnson' => '27EE0004',
            'James Williams' => '27EC0005',
            'Olivia Jones' => '27CH0006',
            'Daniel Garcia' => '27BT0007',
            'Sophia Martinez' => '27IT0008',
            'Lucas Harris' => '27PH0009',
            'Ava Wilson' => '27CH0010',
            'Mia Lee' => '27EE0011',
            'Noah Walker' => '27AM0012',
            'Isabella Robinson' => '27CS0013',
            'Ethan Clark' => '27ME0014',
            'Charlotte Davis' => '27CE0015',
            'Oliver Miller' => '27EE0016',
            'Avery Martinez' => '27EC0017',
            'Mason Anderson' => '27CH0018',
            'Evelyn Thomas' => '27BT0019',
            'Harper Jackson' => '27IT0020',
            'Ella White' => '27AM0021',
            'Aiden King' => '27CS0022',
            'Liam Cruz' => '27AR0023',
            'Grace Graham' => '27MS0024',
            'Eleanor Harris' => '27EC0025'
        ];

        // Data to insert into the course_teacher table
        $courseTeacherAssignments = [
            ['course_id' => $courseIds['Introduction to Programming'], 'teacher_id' => $teacherIds['John Doe']],
            ['course_id' => $courseIds['Introduction to Programming'], 'teacher_id' => $teacherIds['Isabella Robinson']],
            ['course_id' => $courseIds['Engineering Mechanics'], 'teacher_id' => $teacherIds['Jane Smith']],
            ['course_id' => $courseIds['Engineering Mechanics'], 'teacher_id' => $teacherIds['Ethan Clark']],
            ['course_id' => $courseIds['Thermodynamics'], 'teacher_id' => $teacherIds['Michael Brown']],
            ['course_id' => $courseIds['Fluid Mechanics'], 'teacher_id' => $teacherIds['Emily Johnson']],
            ['course_id' => $courseIds['Heat Transfer'], 'teacher_id' => $teacherIds['James Williams']],
            ['course_id' => $courseIds['Mechanics of Materials'], 'teacher_id' => $teacherIds['Olivia Jones']],
            ['course_id' => $courseIds['Machine Design'], 'teacher_id' => $teacherIds['Daniel Garcia']],
            ['course_id' => $courseIds['Computer Networks'], 'teacher_id' => $teacherIds['Sophia Martinez']],
            ['course_id' => $courseIds['Software Engineering'], 'teacher_id' => $teacherIds['Lucas Harris']],
            ['course_id' => $courseIds['Mathematics'], 'teacher_id' => $teacherIds['Ava Wilson']],
            ['course_id' => $courseIds['Mathematics'], 'teacher_id' => $teacherIds['Noah Walker']],
            ['course_id' => $courseIds['Introduction to Programming'], 'teacher_id' => $teacherIds['Aiden King']],
            ['course_id' => $courseIds['Computer Networks'], 'teacher_id' => $teacherIds['Harper Jackson']],
            ['course_id' => $courseIds['Software Engineering'], 'teacher_id' => $teacherIds['Ella White']],
            ['course_id' => $courseIds['Engineering Mechanics'], 'teacher_id' => $teacherIds['Charlotte Davis']],
            ['course_id' => $courseIds['Heat Transfer'], 'teacher_id' => $teacherIds['Oliver Miller']],
            ['course_id' => $courseIds['Mechanics of Materials'], 'teacher_id' => $teacherIds['Mason Anderson']],
            ['course_id' => $courseIds['Machine Design'], 'teacher_id' => $teacherIds['Evelyn Thomas']]
        ];

        // Insert or update assignments
        foreach ($courseTeacherAssignments as $assignment) {
            DB::table('course_teacher')->updateOrInsert(
                [
                    'course_id' => $assignment['course_id'],
                    'teacher_id' => $assignment['teacher_id']
                ],
                $assignment
            );
        }
    }
}
