<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $numRecords = 100; // Adjust the number of records as needed

        // Get all necessary IDs
        $studentIds = DB::table('students')->pluck('id')->toArray();
        $teacherIds = DB::table('teachers')->pluck('id')->toArray();
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();
        $courseIds = DB::table('courses')->pluck('id')->toArray();
        $batchIds = DB::table('batches')->pluck('id')->toArray();
        $timetableIds = DB::table('timetable')->pluck('id')->toArray();

        $data = [];

        for ($i = 0; $i < $numRecords; $i++) {
            $studentId = $studentIds[array_rand($studentIds)];
            $teacherId = $teacherIds[array_rand($teacherIds)];
            $subjectId = $subjectIds[array_rand($subjectIds)];
            $courseId = $courseIds[array_rand($courseIds)];
            $batchId = $batchIds[array_rand($batchIds)];
            $group = ['A', 'B'][array_rand(['A', 'B'])]; // Assuming 'A' and 'B' groups
            $timetableId = $timetableIds[array_rand($timetableIds)];

            // Randomly determine presence (true or false)
            $present = (bool)random_int(0, 1);

            $data[] = [
                'present' => $present,
                'sid' => $studentId,
                'tid' => $teacherId,
                'subject_id' => $subjectId,
                'course_id' => $courseId,
                'batch_id' => $batchId,
                'group' => $group,
                'timetable_id' => $timetableId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert data into attendance table
        DB::table('attendance')->insert($data);
    }
}
