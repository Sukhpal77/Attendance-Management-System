<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\course;
use App\Models\student;
use App\Models\subject;
use App\Models\timetable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\department;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function showTimeTable(Request $request)
    {

    
        $batch_id = batch::first() ? batch::first()->id : null;
        $selectedDay = Carbon::now()->format('l');
        
        if ($request->has('batch_id') && $request->has('day')) {
            $batch_id = $request->input('batch_id');
            $selectedDay = $request->input('day');
        }
        
        $courses = DB::table('courses')->get();
        
        $selectedBatchs = DB::table('batches')
            ->where('id', $batch_id)
            ->select('id', 'batch_name')
            ->first();
        
        if (!$selectedBatchs) {
            return redirect()->back()->withErrors('Selected batch not found.');
        }
        
        $Timetable = DB::table('timetable')
            ->join('subjects', 'timetable.subject_id', '=', 'subjects.id')
            ->join('teachers', 'timetable.teacher_id', '=', 'teachers.id')
            ->join('batches', 'timetable.batch_id', '=', 'batches.id')
            ->select('timetable.id', 'timetable.day', 'semester', 'timetable.start_time', 'timetable.end_time', 'teachers.first_name as teacher_name', 'batches.batch_name', 'subjects.subject_name', 'batches.id as batch_id')
            ->where('batches.id', $batch_id)
            ->where('timetable.day', $selectedDay)
            ->get();
        
        return view('admin.editTimeTable', compact('Timetable', 'courses', 'selectedDay', 'selectedBatchs'));
    }

    public function index()
    {
        $courses = Course::all();
        $currentDay = strtolower(now()->format('l')); 
        $Timetable = Timetable::where('day', ucfirst($currentDay))
            ->with(['batch', 'subject', 'teacher']) 
            ->get(); 
        
            $timetable = $Timetable->map(function ($item) {
                return [
                    'id'=> $item->id,
                    'start_time' => $item->start_time,
                    'end_time' => $item->end_time,
                    'day' => $item->day,
                    'subject' => $item->subject->name ?? 'N/A',
                    'course' => $item->batch->course ?? 'N/A',
                    'semester' => $item->batch->semester ?? 'N/A',
                    'teacher' => ($item->teacher->first_name ?? 'N/A') . ' ' . ($item->teacher->last_name ?? 'N/A'),
                ];
            });    

        return view('admin.timetable.index', [
            'courses' => $courses,
            'Timetable' => $Timetable,
            'currentDay' => $currentDay
        ]);
    }

    
        public function getTimetable(Request $request)
        {
            $batchId = $request->input('batch_id');
            $day = ucfirst($request->input('day'));
    
            $timetable = Timetable::where('batch_id', $batchId)
                ->where('day', $day)
                ->get();

                $timetable = $timetable->map(function ($item) {
                    return [
                        'id'=> $item->id,
                        'start_time' => $item->start_time,
                        'end_time' => $item->end_time,
                        'day' => $item->day,
                        'subject' => $item->subject->subject_name ?? 'N/A',
                        'course' => $item->batch->batch_name ?? 'N/A',
                        'semester' => $item->semester ?? 'N/A',
                        'teacher' => ($item->teacher->first_name ?? 'N/A') . ' ' . ($item->teacher->last_name ?? 'N/A'),
                    ];
                });    
    
            return response()->json([
                'success' => true,
                'timetable' => $timetable
            ]);
        }
    
        public function getBatchess($courseId)
        {
            $batches = Batch::where('course_id', $courseId)->get();
            return response()->json(['batches' => $batches]);
        }


















    


    public function getBatches($courseId)
{
    $batches = Batch::where('course_id', $courseId)->get();
    return response()->json(['batches' => $batches]);
}
    
    
    public function fetchData(string $day){

        $Courses = DB::table('courses')->get();

        return view('admin.addTimeTable',compact('Courses','day'));
    }

    public function fetchData2($id) {
        $dataIds = DB::table('timetable')->where('id', $id)->select('subject_id', 'batch_id')->first();
        
        if (!$dataIds) {
            return redirect()->back()->with('error', 'Data not found.');
        }
    
        $subjectName = subject::where('id', $dataIds->subject_id)->value('subject_name');
        $batchName = batch::where('id', $dataIds->batch_id)->value('batch_name');
        $teachers = DB::table('subject_teacher')
        ->join('teachers', 'subject_teacher.teacher_id', '=', 'teachers.id')
        ->where('subject_teacher.subject_id', $dataIds->subject_id)
        ->select('teachers.id', 'teachers.first_name', 'teachers.last_name')
        ->get();
    
        return view('admin.updateTimeTable', compact('teachers', 'subjectName', 'batchName', 'id'));
    }
    

 
    public function addTimeTable(Request $request)
    {
        $rules = [
            'teacherId' => 'required',
            'subjectId' => 'required',
            'courseId' => 'required',
            'startTime' => 'required|date_format:h:iA', 
            'endTime' => 'required|date_format:h:iA',  
            'day' => 'required|string',
            'semester'=> 'required|max:2',
            'Group'=> 'required',
            'batchId'=>'required',

        ];
    
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $errors->all() 
            ], 422);
        }

    try {
  
        $existingEntryCount = DB::table('timetable')
            ->where('course_id', $request->courseId)
            ->where('start_time', $request->startTime)
            ->where('end_time', $request->endTime)
            ->count();
    
        if ($existingEntryCount > 0) {
            return response()->json(['message' => 'A timetable with the given course, start time, and end time is already scheduled'], 400);
        }
    
       

            DB::transaction(function () use ($request) {
                $data = new Timetable();
                $data->day = $request->day;
                $data->start_time = $request->startTime;
                $data->end_time = $request->endTime;
                $data->subject_id = $request->subjectId;
                $data->teacher_id = $request->teacherId;
                $data->course_id = $request->courseId;
                $data->batch_id = $request->batchId;
                $data->group = $request->Group;
                $data->semester = $request->semester;
                $data->save();
            });
    
            return response()->json(['message' => 'Timetable added successfully'], 201);
    
        } catch (\Exception $e) {
            Log::error('Error adding timetable: ' . $e->getMessage());
    
            return response()->json(['message' => 'An error occurred while adding the timetable', 'error' => $e->getMessage()], 500);
        }
    }
    
    
    

    public function updateTimeTable(Request $request, $id)
    {
        $rules = [
            'teacher_name' => 'required|string',
            'subject' => 'required|string',
            'course_name' => 'required|string',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'required|date_format:H:i',  
            'day' => 'required|string',
        ];
    

        $validator = \Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json('Fields are required: ', 422);
        }

        try {
            $teacher_id = DB::table('teachers')->where('name', $request->teacher_name)->pluck('id')->first();
            $subject_id = DB::table('subjects')->where('subject', $request->subject)->pluck('id')->first();
            $course_id = DB::table('courses')->where('name', $request->course_name)->pluck('id')->first();

            $existingEntry = DB::table('timetable')
                ->where('course_id', $course_id)
                ->where('start', $request->startTime)
                ->where('end', $request->endTime)
                ->where('id', '!=', $id) 
                ->count();
    
            if ($existingEntry === 0) {
                $timetable = timetable::find($id);
    
                if ($timetable) {
                    $timetable->days = $request->days;
                    $timetable->start = $request->startTime;  
                    $timetable->end = $request->endTime;      
                    $timetable->subject_id = $subject_id;
                    $timetable->teacher_id = $teacher_id;
                    $timetable->course_id = $course_id;
    
                    $timetable->save();
    
                    return response()->json(['message' => 'Timetable changed successfully']);
                } else {
                    return response()->json(['message' => 'Timetable record not found'], 404);
                }
            } else {
                return response()->json(['message' => 'A timetable with the given course, start time, and end time is already scheduled'], 400);
            }
        } catch (\Exception $e) {
            \Log::error('Error updating timetable: ' . $e->getMessage());
    
            return response()->json(['message' => 'An error occurred while updating the timetable', 'error' => $e->getMessage()], 500);
        }
    }
    
    


    public function deleteTimeTable(Request $request, $id)
    {
        DB::table('timetable')->where('id', $id)->delete();
        return redirect()->route('adminTimeTable')->with('success', 'Timetable entry deleted successfully!');
    }

    public function deleteUser(Request $request)
    {
        $id = $request->input('id');
        $role = $request->input('role');
    
        if (!in_array($role, ['teacher', 'student'])) {
            return redirect()->route('admin.updateProfile')->with('error', 'Invalid role specified.');
        }
    
        try {
            DB::beginTransaction();
            if ($role == 'teacher') {
                DB::table('teachers')->where('id', $id)->delete();
            } elseif ($role == 'student') {
                DB::table('students')->where('id', $id)->delete();
            }
            DB::table('users')->where('userId', $id)->delete();
    
            DB::commit();
            return redirect()->route('admin.updateProfile')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error deleting user: ' . $e->getMessage());
            return redirect()->route('admin.updateProfile')->with('error', 'An error occurred while deleting the user.');
        }
    }
    





///// add data /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
public function addDepartment(Request $request)
{
    $rules = [
        'name' => ['required', 'string', 'max:255', Rule::unique('departments')],
        'notes' => ['nullable', 'string'] // Include validation for notes if needed
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed!', 'errors' => $validator->errors()], 422);
    }

    try {
        DB::beginTransaction();

        $departmentName = strtoupper($request->input('name'));

        // Create and save the new department
        $department = new Department();
        $department->name = $departmentName; // Save the name in uppercase
        $department->description = $request->input('notes');
        $department->save();

        DB::commit();

        return response()->json('Department added successfully!', 200);
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error adding department: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while adding the department', 'error' => $e->getMessage()], 500);
    }
}


    public function addCourse(Request $request)
    {
        $rule = [ 'course_name' => ['required','string','max:255',Rule::unique('courses')],
            'department' => ['required','string'],];
        
        $validator = Validator::make($request->all(), $rule);
    
        if ($validator->fails()) {
            return response()->json('Validation failed!!', 422);
        }
        try {
            $course = new course();
            $course->course_name = strtoupper($request->input('course_name'));
            $course->department_id = $request->input('department');
            $course->save();
    
            return response()->json('Course added successfully!', 200);
        } catch (\Exception $e) {
            \Log::error('Error adding course: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred while adding the course', 'error' => $e->getMessage()], 500);
        }
    }

    public function getAllDepartmentNames()
{
    $departments=DB::table('departments')->get();

    return view('admin.addcourse',compact('departments'));
}

public function getAllDepartmentNames2()
{
    $departments=DB::table('departments')->get();

    return view('admin.addsubject',compact('departments'));
}
    
public function addBatch(Request $request)
{
    $rule = ['batch_name' => ['required','string','max:255',Rule::unique('batches')],
        'course' => [ 'required','string'],];
    $validator = Validator::make($request->all(), $rule);

    if ($validator->fails()) {
        return response()->json('Validation failed!', 422);
    }

    try {
        $batch = new batch();
        $batch->batch_name = strtoupper($request->input('batch_name'));
        $batch->course_id = $request->input('course');
        $batch->save();

        return response()->json('Batch added successfully!', 200);
    } catch (\Exception $e) {
        \Log::error('Error adding course: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while adding the batch', 'error' => $e->getMessage()], 500);
    }
}

public function getAllCourseNames()
{
    $courses=DB::table('courses')->get();

    return view('admin.addbatch',compact('courses'));
}

//////////////////////////////////////////////////////////////////////////////////
public function fetchCourses(Request $request)
{
    $departmentId = $request->input('departmentId');
    $courses = Course::where('department_id', $departmentId)->get(['id', 'course_name as name']);
    return response()->json(['courses' => $courses]);
}

public function fetchSubjects(Request $request)
{
    $courseId = $request->input('courseId');
    $subjects = Course::find($courseId)->subjects()->get(['id', 'subject_name as name']);
    return response()->json(['subjects' => $subjects]);
}


public function getTeachers(Request $request)
{
    $subjectId = $request->input('subjectId');
    $teachers = subject::find($subjectId)->teachers()->get(['id', 'first_name','last_name']);
    return response()->json(['teachers' => $teachers]);
}

//////////////////////////////////////////////////////////////////////////////////

public function addSubject(Request $request)
{
    $validator = Validator::make($request->all(), [
        'course' => 'required|exists:courses,id',
        'subject_name' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $course = Course::find($request->course);

    if (!$course) {
        return response()->json('Course not found!', 404);
    }
    $subjectName = strtoupper($request->subject_name);
    $existingSubject = $course->subjects()->whereRaw('UPPER(subject_name) = ?', [$subjectName])->first();

    if ($existingSubject) {
        return response()->json('Subject name already exists!', 422);
    }
    try {
        $subject = new Subject();
        $subject->subject_name = $subjectName;
        $subject->save();

        $courseId = $request->input('course');
        $course->subjects()->attach($courseId);

        return response()->json('Subject added successfully!', 200);
    } catch (\Exception $e) {
        \Log::error('Error adding subject: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while adding the subject', 'error' => $e->getMessage()], 500);
    }
}


public function updateProfile(Request $request)
{
    $query = $request->input('query');
    $role = $request->input('role', 'student'); 

    // Check for valid role
    if (!in_array($role, ['teacher', 'student'])) {
        return redirect()->back()->with('error', 'Invalid role selected.');
    }

    if ($role == 'teacher') {
        $usersInfo = Teacher::query();
    } elseif ($role == 'student') {
        $usersInfo = Student::query();
    }

    if ($query) {
        $usersInfo->where(function($q) use ($query) {
            $q->where('first_name', 'like', '%' . $query . '%')
              ->orWhere('last_name', 'like', '%' . $query . '%');
        });
    }

    $usersInfo = $usersInfo->get();

    return view('admin.updateprofile', compact('usersInfo', 'role'));
}




}

   