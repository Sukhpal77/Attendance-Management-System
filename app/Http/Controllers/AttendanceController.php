<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

    public function updateAttendance(Request $request)
    {
        $query = $request->input('query');
        $date = $request->input('date', date('Y-m-d'));
        $dayName = date('l', strtotime($date));
    
        $timetableInfo = DB::table('timetable')
            ->where('day', $dayName)
            ->get();
    
        $attendanceQuery = DB::table('attendance')
            ->join('students', 'attendance.sid', '=', 'students.id')
            ->whereIn('attendance.timetable_id', $timetableInfo->pluck('id'));
    
        if ($query) {
            $attendanceQuery = $attendanceQuery->where(function ($q) use ($query) {
                $q->where('students.first_name', 'like', "%$query%")
                  ->orWhere('students.last_name', 'like', "%$query%")
                  ->orWhere('students.id', 'like', "%$query%");
            });
        } else {
            $attendanceQuery = $attendanceQuery->orderBy('attendance.updated_at', 'desc')
                                                 ->limit(10);
        }
    
        $attendanceInfo = $attendanceQuery->get();
    
        $data = $timetableInfo->map(function ($timetable) use ($attendanceInfo) {
            $timetable->attendance = $attendanceInfo->where('timetable_id', $timetable->id);
            return $timetable;
        });
    
        return view('admin.updateAttendance', compact('data', 'date', 'query'));
    }
    
    
    
}

