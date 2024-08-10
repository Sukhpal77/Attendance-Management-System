<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\result;
use App\Models\student;
use App\Models\subject;
use App\Models\timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class resultController extends Controller
{
    public function showResult($semester=1)
{
    $studentId=Auth::user()->userId;
    $userrole=Auth::user()->role;
    $student = student::findOrFail($studentId);
    $courseName = $student->course->course_name;
    $results = Result::where('student_id', $studentId)->where('semester', $semester)->get();

  $semesters = Student::distinct()->orderBy('semester')->pluck('semester');

    $totalCGPA = $this->calculateTotalCGPA($studentId);
    $totalSGPA = $this->calculateTotalSGPA($studentId, $semester);

    return view('result.result', compact('student', 'courseName', 'results', 'totalCGPA', 'totalSGPA', 'semesters','semester','userrole'));
}

private function calculateTotalCGPA($studentId)
{
    $results = Result::where('student_id', $studentId)->get();
    $totalCredits = 0;
    $totalPoints = 0;

    foreach ($results as $result) {
        $totalCredits += $result->credits;
        $totalPoints += $result->credits * $this->getGradePoint($result->grade);
    }

    return $totalCredits > 0 ? $totalPoints / $totalCredits : 0;
}

private function calculateTotalSGPA($studentId, $semester)
{
    $results = Result::where('student_id', $studentId)->where('semester', $semester)->get();
    $totalCredits = 0;
    $totalPoints = 0;

    foreach ($results as $result) {
        $totalCredits += $result->credits;
        $totalPoints += $result->credits * $this->getGradePoint($result->grade);
    }

    return $totalCredits > 0 ? $totalPoints / $totalCredits : 0;
}

private function getGradePoint($grade)
{
    $gradePoints = [
        'A+' => 4.0,
        'A' => 4.0,
        'A-' => 3.7,
        'B+' => 3.3,
        'B' => 3.0,
        'B-' => 2.7,
        'C+' => 2.3,
        'C' => 2.0,
        'C-' => 1.7,
        'D+' => 1.3,
        'D' => 1.0,
        'F' => 0.0,
    ];

    return $gradePoints[$grade] ?? 0.0;
}
public function showResultAllStudent(Request $request, $student_id = 1, $subject_id = 1, $batch_id = 1)
{
    $teacherId = Auth::user()->userId;
    $userrole = Auth::user()->role;

    $subject_batch = timetable::distinct()->where('teacher_id', $teacherId)->pluck('subject_id', 'batch_id');

    if ($subject_batch->isEmpty()) {
        return redirect()->back()->with('error', 'No subjects found for this teacher.');
    }

    $batches = batch::whereIn('id', $subject_batch->pluck('batch_id'))->get();
    $subjects = subject::whereIn('id', $subject_batch->pluck('subject_id'))->get();

    if (!$subject_id) {
        $subject_id = $subjects->first()->id;
    }

    $studentIds = student::whereIn('batch_id', $subject_batch->pluck('batch_id'))->pluck('id');

    if (!$student_id) {
        $student_id = $studentIds->first();
    }

    $student = student::find($student_id);
    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    $batch = batch::findOrFail($student->batch_id);
    $courseName = $batch->course->course_name;
    $results = Result::where('student_id', $student_id)->where('subject_id', $subject_id)->get();

    $totalCGPA = $this->calculateTotalCGPA($student_id);
    $totalSGPA = $this->calculateTotalSGPA($student_id, $batch->semester);

    $query = $request->input('query');
    if ($query) {
        $students = student::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', '%' . $query . '%')
            ->get();
    } else {
        $students = student::all();
    }

    return view('result.result', compact('student', 'courseName', 'results', 'totalCGPA', 'totalSGPA', 'userrole', 'batches', 'students', 'query'));
}

}
