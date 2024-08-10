<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamDateSheetController extends Controller
{
    
public function showDateSheet($batch_id = null)
{
    $user = Auth::user();
    $userrole =$user->role;
    $userId = $user->userId;
    $selectedBatch = null;

    if ($userrole == 'teacher') {
        $batch_ids = DB::table('timetable')
            ->where('teacher_id', $userId) 
            ->pluck('batch_id')
            ->toArray();

        if ($batch_id === null && !empty($batch_ids)) {
            $batch_id = $batch_ids[0];
        }

        $exams = DB::table('exams')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->join('batches', 'exams.batch_id', '=', 'batches.id')
            ->select('exams.exam_date', 'exams.exam_time', 'subjects.subject_name', 'batches.batch_name', 'exams.group')
            ->whereIn('exams.batch_id', $batch_ids)
            ->get();

        $batches = DB::table('batches')
            ->whereIn('id', $batch_ids)
            ->get();

        return view('exam.dateSheet', compact('exams', 'batches','userrole','selectedBatch'));
    } else {
        $batch_group = DB::table('students')
            ->where('id',$userId ) 
            ->select('batch_id','group')
            ->first();
            $batches = collect();
   

        $exams = DB::table('exams')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->join('batches', 'exams.batch_id', '=', 'batches.id')
            ->select('exams.exam_date', 'exams.exam_time', 'subjects.subject_name', 'batches.batch_name', 'exams.group')
            ->where('exams.batch_id', $batch_group->batch_id)
            ->where('exams.group', $batch_group->group)
            ->get();

            $selectedBatch = DB::table('batches')
            ->where('id', $batch_group->batch_id)
            ->select('id', 'batch_name')
            ->first();

        return view('exam.dateSheet', compact('exams', 'batches','userrole','selectedBatch'));
    }
}

}
