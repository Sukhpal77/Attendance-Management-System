<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Userinfo extends Controller
{ public function showProfile(Request $request)
    {
        if ($request->has('id') && $request->has('role')) {
            $userId = $request->input("id");
            $userrole = $request->input("role");
        } else {
            $person = auth()->user();
            $userId = $person->userId;
            $userrole = $person->role;
        }
    
        $user = null;
        $departmentName = null;
        $courseName = null;
        $batchName = null;
    
        switch ($userrole) {
            case 'admin':
                $user = DB::table('admin')->where('id', $userId)->first();
                if ($user) {
                    $departmentName = DB::table('departments')->where('id', $user->department_id)->pluck('name')->first();
                }
                break;
    
            case 'teacher':
                $user = DB::table('teachers')->where('id', $userId)->first();
                if ($user) {
                    $departmentName = DB::table('departments')->where('id', $user->department_id)->pluck('name')->first();
                }
                break;
    
            case 'student':
                $user = DB::table('students')->where('id', $userId)->first();
                if ($user) {
                    $courseName = DB::table('courses')->where('id', $user->course_id)->pluck('course_name')->first();
                    $batchName = DB::table('batches')->where('id', $user->batch_id)->pluck('batch_name')->first();
                }
                break;
    
            default:
                $user = null;
                break;
        }
    
        return view('common.profile', compact('user', 'departmentName', 'courseName', 'batchName', 'userrole'));
    }
    
    public function reset()
    {
        $user = auth()->user();
        $userrole = $user->role;
        return view('common.reset', compact('user', 'userrole'));
    }
    

}
