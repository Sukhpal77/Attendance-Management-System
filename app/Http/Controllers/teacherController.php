<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class teacherController extends Controller
{
    public function showTimeTable(string $selectedDay= null)
    {
        $user = Auth::user();
        $userId = $user->userId;
        if (empty($selectedDay)) {
            $selectedDay = Carbon::now()->format('l');
        }
        $Timetable=DB::table("timetable")
        ->join('subjects', 'timetable.subject_id', '=', 'subjects.id')
        ->join('teachers', 'timetable.teacher_id', '=', 'teachers.id')
        ->join('courses', 'timetable.course_id', '=', 'courses.id')
        ->select('timetable.day','timetable.id', 'timetable.start_time', 'timetable.end_time','timetable.subject_id', 'teachers.first_name as teacher_name', 'courses.course_name as course_name','subjects.subject_name')
        ->where('teachers.id','=', $userId)
        ->where('day','=', $selectedDay)
        ->get();
        return view('teacher.timeTable',['data'=>$Timetable,'selectedDay' => $selectedDay,]);
        // dd($Timetable);
    }

    public function takeAttendance($id)
    {
        $timeTableEntry = DB::table('timetable')
            ->join('subjects', 'timetable.subject_id', '=', 'subjects.id')
            ->join('teachers', 'timetable.teacher_id', '=', 'teachers.id')
            ->join('courses', 'timetable.course_id', '=', 'courses.id')
            ->join('batches', 'timetable.batch_id', '=', 'batches.id')
            ->select('timetable.*', 'subjects.subject_name', 'teachers.first_name as teacher_name', 'courses.course_name', 'batches.batch_name as batch')
            ->where('timetable.id', $id)
            ->first();
    
        if (!$timeTableEntry) {
            return redirect()->back()->with('error', 'Time table entry not found.');
        }
        $currentTime = now();
        $lectureStartTime = Carbon::parse($timeTableEntry->start_time);
        $lectureEndTime = Carbon::parse($timeTableEntry->end_time)->addMinutes(10);
    
        if ($currentTime->lt($lectureStartTime) || $currentTime->gt($lectureEndTime)) {
            return redirect()->back()->with('error', 'You can only take attendance within the lecture time plus 10 minutes.');
        }
        $attendanceTaken = DB::table('attendance')
            ->where('timetable_id', $id)
            ->whereDate('created_at', $currentTime->toDateString())
            ->exists();
    
        if ($attendanceTaken) {
            return redirect()->back()->with('error', 'Attendance for this lecture has already been taken.');
        }
        $students = DB::table('students')
            ->where('course_id', $timeTableEntry->batch_id)
            ->get();
    
        return view('teacher.attendance', compact('timeTableEntry', 'students'));
    }
    

public function submitAttendance(Request $request)
{
    $attendanceData = $request->input('attendance');
    $success = true;

    try {
        foreach ($attendanceData as $studentId => $data) {
            DB::table('attendance')->insert([
                'sid' => $studentId,
                'group' => 'a',
                'tid' => $request->input('teacher_id'),
                'subject_id' => $request->input('subject_id'),
                'course_id' => $request->input('course_id'),
                'batch_id' => $request->input('batch_id'),
                'timetable_id'=> $request->input('timetable_id'),
                'present' => $data['present'] ?? 0, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Attendance submitted successfully.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to submit attendance. Please try again.'], 500);
    }
}

public function autoSelected()
{
    $currentTime = now()->format('H:i:s');
    $currentDay = now()->format('l');

    $timeTableEntry = DB::table('timetable')
        ->join('subjects', 'timetable.subject_id', '=', 'subjects.id')
        ->join('teachers', 'timetable.teacher_id', '=', 'teachers.id')
        ->join('courses', 'timetable.course_id', '=', 'courses.id')
        ->join('batches', 'timetable.batch_id', '=', 'batches.id')
        ->select('timetable.*', 'subjects.subject_name', 'teachers.first_name as teacher_name', 'courses.course_name', 'batches.batch_name as batch')
        ->where('timetable.day', $currentDay) 
        ->whereTime('timetable.start_time', '<=', $currentTime)
        ->whereTime('timetable.end_time', '>=', $currentTime)
        ->first();

    if (!$timeTableEntry) {
        return redirect()->back()->with('error', 'No matching timetable entry found for the current time and day.');
    }

    $students = DB::table('students')
    ->where('batch_id', $timeTableEntry->batch_id)
    ->get();
    return view('teacher.attendance', compact('timeTableEntry', 'students'));
}

public function CreateDateSheet($batchId = null)
{
    if (!$batchId) {
        return redirect()->back()->with('error', 'Please select a class first before adding a date sheet.');
    }
    $batch=Db::table('batches')->where('id', $batchId)->first();
    $subjects = DB::table('subjects')->get();
    return view('teacher.addDateSheet', compact('batch','subjects'));
}

public function storeDateSheet(Request $request)
{
    try {
        $exam = new Exam();
        $exam->batch_id = $request->batch_id;
        $exam->subject_id = $request->subject_id;
        $exam->group = $request->group;
        $exam->exam_date = $request->exam_date;
        $exam->exam_time = $request->exam_time;
        $exam->exam_type = $request->exam_type;
        $exam->save();

        return redirect()->back()->with('success', 'Exam DateSheet added successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to add Exam DateSheet. Please try again.');
    }
}



}
