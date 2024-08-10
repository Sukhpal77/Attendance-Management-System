<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\batch;
use App\Models\course;
use App\Models\department;
use App\Models\student;
use App\Models\subject;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddUserController extends Controller
{


    //////////////////////////teacher////////////////////////////
    public function addTeacher(Request $request)
    {
        $rules = [
            'id' => 'nullable|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $request->input('id'),
            'number' => 'required|string|max:15',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
            'department_id' => 'required|exists:departments,id',
            'qualification' => 'required|string|max:255',
            'mother-name' => 'required|string|max:255',
            'father-name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'subject_id' => 'required|exists:subjects,id',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed!', 'errors' => $validator->errors()], 422);
        }
    
        try {
            $teacherId = $request->input('id');
            $courseId = $request->input('course_id');
            $subjectId = $request->input('subject_id');
            $firstName = $request->input('first_name');
            $mobileNumber = $request->input('number');
            $password = substr($firstName, 0, 4) . substr($mobileNumber, -4);
    
            if ($teacherId) {
                // Update existing teacher
                $teacher = Teacher::where('id', $teacherId)->first();
    
                if (!$teacher) {
                    return response()->json(['message' => 'Teacher not found!'], 404);
                }
    
                $teacher->first_name = $firstName;
                $teacher->last_name = $request->input('last_name');
                $teacher->father_name = $request->input('father-name');
                $teacher->mother_name = $request->input('mother-name');
                $teacher->email = $request->input('email');
                $teacher->number = $request->input('number');
                $teacher->street_address = $request->input('street_address');
                $teacher->city = $request->input('city');
                $teacher->state = $request->input('state');
                $teacher->pincode = $request->input('pincode');
                $teacher->department_id = $request->input('department_id');
                $teacher->qualification = $request->input('qualification');
                $teacher->save();
    
                $course = Course::find($courseId);
                $subject = Subject::find($subjectId);
    
                if (!$course) {
                    return response()->json(['message' => 'Course not found!'], 404);
                }
                if (!$subject) {
                    return response()->json(['message' => 'Subject not found!'], 404);
                }
    
                $course->teachers()->syncWithoutDetaching([$teacherId]);
                $subject->teachers()->syncWithoutDetaching([$teacherId]);
    
                $user = User::where('userId', $teacherId)->first();
    
                if ($user) {
                    $user->name = strtoupper($firstName) . ' ' . $request->input('last_name');
                    $user->email = $request->input('email');
                    $user->save();
                }
    
                return response()->json(['message' => 'Teacher updated successfully!'], 200);
            } else {
                // Add new teacher
                $latestTeacher = Teacher::latest('id')->first();
                $department = DB::table('departments')->where("id", $request->input('department_id'))->first();
                $departmentPrefix = strtoupper(substr($department->name, 0, 3));
    
                $currentYear = date('y');
                $lastIndex = 0;
    
                if ($latestTeacher) {
                    preg_match('/(\d{3})$/', $latestTeacher->id, $matches);
                    $lastIndex = isset($matches[1]) ? intval($matches[1]) : 0;
                }
    
                $newIndex = str_pad($lastIndex + 1, 3, '0', STR_PAD_LEFT);
                $newTeacherId = $departmentPrefix . $currentYear . $newIndex;
    
                $teacher = new Teacher();
                $teacher->id = $newTeacherId;
                $teacher->first_name = $firstName;
                $teacher->last_name = $request->input('last_name');
                $teacher->father_name = $request->input('father-name');
                $teacher->mother_name = $request->input('mother-name');
                $teacher->email = $request->input('email');
                $teacher->number = $request->input('number');
                $teacher->street_address = $request->input('street_address');
                $teacher->city = $request->input('city');
                $teacher->state = $request->input('state');
                $teacher->pincode = $request->input('pincode');
                $teacher->department_id = $request->input('department_id');
                $teacher->qualification = $request->input('qualification');
                $teacher->save();
    
                $course = Course::find($courseId);
                $subject = Subject::find($subjectId);
    
                if (!$course) {
                    return response()->json(['message' => 'Course not found!'], 404);
                }
                if (!$subject) {
                    return response()->json(['message' => 'Subject not found!'], 404);
                }
    
                $course->teachers()->attach($newTeacherId);
                $subject->teachers()->attach($newTeacherId);
    
                $user = new User();
                $user->name = strtoupper($firstName) . ' ' . $request->input('last_name');
                $user->email = $request->input('email');
                $user->userId = $newTeacherId;
                $user->role = $request->input('role');
                $user->password = Hash::make($password);
                $user->save();
    
                return response()->json(['message' => 'Teacher added successfully!'], 200);
            }
        } catch (\Exception $e) {
            \Log::error('Error adding or updating teacher: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred while adding or updating the teacher', 'error' => $e->getMessage()], 500);
        }
    }
    

public function fetchDepartment(Request $request){
    $id = null;
    if($request->has('id')) {
        $id = $request->input('id');
    } 
    $departments=Department::all();
    return view('admin.addTeacher',compact('departments','id'));
   }




////////////////////////////////student///////////////////////////////////////////////////////

public function fetchCourse2(Request $request){
    $id = null;
    if($request->has('id')) {
        $id = $request->input('id');
    } 
    $courses = Course::all();
    return view('admin.addStudent',compact('courses','id'));
   }

   public function fetchBatch(Request $request){
    $courseId = $request->input('courseId');
    $batchs = batch::where('course_id', $courseId)->get(['id', 'batch_name as name']);
    return response()->json(['batchs' => $batchs]);
   }

  
public function addStudent(Request $request)
{
    $rules = [
        'id' => 'nullable|string',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $request->input('id'),
        'number' => 'required|string|max:15',
        'mother-name' => 'required|string|max:255',
        'father-name' => 'required|string|max:255',
        'street_address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'pincode' => 'required|string|max:10',
        'course_id' => 'required|exists:courses,id',
        'batch_id' => 'required|exists:batches,id',
        'group' => 'required|string|max:100',
        'semester' => 'required|max:2',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed!', 'errors' => $validator->errors()], 422);
    }

    try {
        $studentId = $request->input('id');

        if ($studentId) {
            $student = Student::where('id', $studentId)->first();

            if (!$student) {
                return response()->json(['message' => 'Student not found!'], 404);
            }

            $student->first_name = strtoupper($request->input('first_name'));
            $student->last_name = $request->input('last_name');
            $student->father_name = $request->input('father-name');
            $student->mother_name = $request->input('mother-name');
            $student->semester = $request->input('semester');
            $student->email = $request->input('email');
            $student->number = $request->input('number');
            $student->street_address = $request->input('street_address');
            $student->city = $request->input('city');
            $student->state = $request->input('state');
            $student->pincode = $request->input('pincode');
            $student->course_id = $request->input('course_id');
            $student->batch_id = $request->input('batch_id');
            $student->group = $request->input('group');
            $student->save();

            $user = User::where('userId', $studentId)->first();

            if ($user) {
                $user->name = strtoupper($request->input('first_name')) . ' ' . $request->input('last_name');
                $user->email = $request->input('email');
                $user->save();
            }

            return response()->json(['message' => 'Student updated successfully!'], 200);
        } else {
            $latestStudent = Student::latest('id')->first();
            $course = DB::table('courses')->where('id', $request->input('course_id'))->first();

            if (!$course) {
                return response()->json(['message' => 'Course not found!'], 404);
            }

            $coursePrefix = strtoupper(substr($course->course_name, 0, 3));
            $currentYear = date('y');
            $lastIndex = 0;

            if ($latestStudent) {
                preg_match('/(\d{3})$/', $latestStudent->id, $matches);
                $lastIndex = isset($matches[1]) ? intval($matches[1]) : 0;
            }

            $newIndex = str_pad($lastIndex + 1, 3, '0', STR_PAD_LEFT);
            $newStudentId = $currentYear . $coursePrefix . $newIndex;

            $firstName = strtoupper($request->input('first_name'));
            $mobileNumber = $request->input('number');
            $password = substr($firstName, 0, 4) . substr($mobileNumber, -4);

            $student = new Student();
            $student->id = $newStudentId;
            $student->first_name = $firstName;
            $student->last_name = $request->input('last_name');
            $student->father_name = $request->input('father-name');
            $student->mother_name = $request->input('mother-name');
            $student->semester = $request->input('semester');
            $student->email = $request->input('email');
            $student->number = $request->input('number');
            $student->street_address = $request->input('street_address');
            $student->city = $request->input('city');
            $student->state = $request->input('state');
            $student->pincode = $request->input('pincode');
            $student->course_id = $request->input('course_id');
            $student->batch_id = $request->input('batch_id');
            $student->group = $request->input('group');
            $student->save();

            $user = new User();
            $user->name = $firstName . ' ' . $request->input('last_name');
            $user->email = $request->input('email');
            $user->userId = $newStudentId;
            $user->role = $request->input('role');
            $user->password = Hash::make($password);
            $user->save();

            return response()->json(['message' => 'Student added successfully!'], 200);
        }
    } catch (\Exception $e) {
        \Log::error('Error adding or updating student: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while adding or updating the student', 'error' => $e->getMessage()], 500);
    }
}
   

public function createAdmin(){
    $departments=Department::all();
    return view('admin.addAdmin',compact('departments'));
}

public function storeAdmin(Request $request)
{
    $rules = [
        'id' => 'nullable|string',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'mother-name' => 'required|string|max:255',
        'father-name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,' . $request->input('id'),
        'number' => 'required|string|max:15',
        'street_address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'pincode' => 'required|string|max:10',
        'position' => 'required|string|max:255',
        'department_id' => 'required|exists:departments,id',
        'qualification' => 'required|string|max:255',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed!', 'errors' => $validator->errors()], 422);
    }

    try {
        DB::beginTransaction();

        $adminId = $request->input('id');
        $department = DB::table('departments')->where('id', $request->input('department_id'))->first();

        if (!$department) {
            return response()->json(['message' => 'Department not found!'], 404);
        }

        $departmentPrefix = strtoupper(substr($department->name, 0, 3));
        $currentYear = date('y');
        $lastIndex = 0;

        if ($adminId) {
            $admin = Admin::where('id', $adminId)->first();

            if (!$admin) {
                return response()->json(['message' => 'Admin not found!'], 404);
            }

            $admin->first_name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->father_name = $request->input('father-name');
            $admin->mother_name = $request->input('mother-name');
            $admin->email = $request->input('email');
            $admin->number = $request->input('number');
            $admin->street_address = $request->input('street_address');
            $admin->city = $request->input('city');
            $admin->state = $request->input('state');
            $admin->pincode = $request->input('pincode');
            $admin->position = $request->input('position');
            $admin->department_id = $request->input('department_id');
            $admin->qualification = $request->input('qualification');
            $admin->save();

            $user = User::where('userId', $adminId)->first();

            if ($user) {
                $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
                $user->email = $request->input('email');
                $user->save();
            }
        } else {
            $latestAdmin = Admin::latest('id')->first();

            if ($latestAdmin) {
                preg_match('/(\d{3})$/', $latestAdmin->id, $matches);
                $lastIndex = isset($matches[1]) ? intval($matches[1]) : 0;
            }

            $newIndex = str_pad($lastIndex + 1, 3, '0', STR_PAD_LEFT);
            $newAdminId = $departmentPrefix . $currentYear . $newIndex;
            $firstName = $request->input('first_name');
            $mobileNumber = $request->input('number');
            $password = substr($firstName, 0, 4) . substr($mobileNumber, -4);

            $admin = new Admin();
            $admin->id = $newAdminId;
            $admin->first_name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->father_name = $request->input('father-name');
            $admin->mother_name = $request->input('mother-name');
            $admin->email = $request->input('email');
            $admin->number = $request->input('number');
            $admin->street_address = $request->input('street_address');
            $admin->city = $request->input('city');
            $admin->state = $request->input('state');
            $admin->pincode = $request->input('pincode');
            $admin->position = $request->input('position');
            $admin->department_id = $request->input('department_id');
            $admin->qualification = $request->input('qualification');
            $admin->save();

            $user = new User();
            $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
            $user->email = $request->input('email');
            $user->userId = $newAdminId;
            $user->role = $request->input('role');
            $user->password = Hash::make($password);
            $user->save();
        }

        DB::commit();

        return response()->json(['message' => 'Admin processed successfully!'], 200);
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error processing Admin: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while processing the Admin', 'error' => $e->getMessage()], 500);
    }
}


}
