<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class studentController extends Controller
{
    public function showTimeTable(string $selectedDay= null)
    {
        $user = Auth::user();
        $userId = $user->userId;
    
        $batchId = DB::table('students')->where('id', $userId)->pluck('batch_id')->first();
        $batchName = DB::table('batches')->where('id', $batchId)->pluck('batch_name')->first();
    
        if (empty($selectedDay)) {
            $selectedDay = Carbon::now()->format('l');
        }
    
        $Timetable = DB::table("timetable")
            ->join('subjects', 'timetable.subject_id', '=', 'subjects.id')
            ->join('teachers', 'timetable.teacher_id', '=', 'teachers.id')
            ->join('batches', 'timetable.batch_id', '=', 'batches.id')
            ->select('timetable.id', 'timetable.day', 'timetable.start_time', 'timetable.end_time', 'teachers.first_name as teacher_name', 'batches.batch_name', 'subjects.subject_name', 'batches.id as batch_id')
            ->where('batches.id', $batchId)
            ->where('timetable.day', $selectedDay)
            ->get();
    
        return view('student.timetable', ['data' => $Timetable, 'selectedDay' => $selectedDay, 'batchName' => $userId]);
    }
    

public function showAttendance(Request $request)
{
    $student_id = 12;
    $filterSubject = $request->input('filter_subject');
    $sortOption = $request->input('sort_option');

    $query = DB::table('attendance')
        ->join('students', 'attendance.sid', '=', 'students.id')
        ->join('subjects', 'attendance.subject_id', '=', 'subjects.id')
        ->where('students.id', $student_id)
        ->select('present', 'students.id as student_id', 'subjects.subject_name');

    if ($filterSubject) {
        $query->where('subjects.subject_name', $filterSubject);
    }

    $attend = $query->get();

    $subjectAttendance = [];

    foreach ($attend as $record) {
        $subject = $record->subject_name;
        if (!isset($subjectAttendance[$subject])) {
            $subjectAttendance[$subject] = ['total' => 0, 'present' => 0];
        }
        $subjectAttendance[$subject]['total']++;
        if ($record->present) {
            $subjectAttendance[$subject]['present']++;
        }
    }

    // Sorting logic
    if ($sortOption === 'percentage_asc') {
        uasort($subjectAttendance, function ($a, $b) {
            $percA = $a['total'] ? ($a['present'] / $a['total']) * 100 : 0;
            $percB = $b['total'] ? ($b['present'] / $b['total']) * 100 : 0;
            return $percA <=> $percB;
        });
    } elseif ($sortOption === 'percentage_desc') {
        uasort($subjectAttendance, function ($a, $b) {
            $percA = $a['total'] ? ($a['present'] / $a['total']) * 100 : 0;
            $percB = $b['total'] ? ($b['present'] / $b['total']) * 100 : 0;
            return $percB <=> $percA;
        });
    } elseif ($sortOption === 'total_asc') {
        uasort($subjectAttendance, function ($a, $b) {
            return $a['total'] <=> $b['total'];
        });
    } elseif ($sortOption === 'total_desc') {
        uasort($subjectAttendance, function ($a, $b) {
            return $b['total'] <=> $a['total'];
        });
    }

    $subjects = DB::table('subjects')->pluck('subject_name');

    return view('student.Attendance', compact('subjectAttendance', 'subjects'));
}


}
