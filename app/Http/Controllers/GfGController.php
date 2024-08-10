<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Course;
use App\Models\department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GfGController extends Controller
{
// YourController.php// YourController.php


public function demoAdmin()
{
    return view('demo');
   }
   function demoAdmin2(Request $request)
{
    // Validation rules
    $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:admin,email',
        'number' => 'required|string|max:15',
        'street_address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'pincode' => 'required|string|max:10',
        // 'position' => 'required|string|max:255', // Ensure course exists
         // Ensure department exists
        'qualification' => 'required|string|max:255',
    ];

    // Validate the request data
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed!', 'errors' => $validator->errors()], 422);
    }

    try {
        DB::beginTransaction();

        // Fetch the latest student ID (if needed for ID generation)
        $latestAdmin = admin::latest('id')->first();

        // Fetch course details for prefix (assumes course table has 'curse_name' column)
        $department = 'helo';

        // Check if course details were fetched successfully
        if (!$department) {
            return response()->json(['message' => 'Department not found!'], 404);
        }

        $departmentPrefix = strtoupper(substr($department, 0, 3));

        // Generate components for the new ID
        $currentYear = date('y');
        $lastIndex = 0;

        if ($latestAdmin) {
            preg_match('/(\d{3})$/', $latestAdmin->id, $matches);
            $lastIndex = isset($matches[1]) ? intval($matches[1]) : 0;
        }

        // Increment the last index and pad it with leading zeros
        $newIndex = str_pad($lastIndex + 1, 3, '0', STR_PAD_LEFT);

        // Create the new student ID
        $newAdminId = $departmentPrefix . $currentYear . $newIndex;

        // Generate password using the first 4 characters of the first name and last 4 digits of the mobile number
        $firstName = $request->input('first_name');
        $mobileNumber = $request->input('number');
        $password = substr($firstName, 0, 4) . substr($mobileNumber, -4);

        // Create and save the new student
        $student = new admin();
        $student->id = $newAdminId;
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->number = $request->input('number');
        $student->street_address = $request->input('street_address');
        $student->city = $request->input('city');
        $student->state = $request->input('state');
        $student->pincode = $request->input('pincode');
        // $student->position = $request->input('position');
        // $student->department_id = $request->input('department_id');
        // $student->qualification = $request->input('qualification');
        $student->save();

        // Create and save a new user
        // $user = new User();
        // $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
        // $user->email = $request->input('email');
        // $user->admin_id = $newAdminId;
        // $user->role = $request->input('role');
        // $user->password = Hash::make($password); // Hash the password
        // $user->save();

        DB::commit();

        return response()->json(['message' => 'Admin added successfully!'], 200);
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error adding Admin: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while adding the Admin', 'error' => $e->getMessage()], 500);
    }
}
}