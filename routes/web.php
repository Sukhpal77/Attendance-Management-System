<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExamDateSheetController;
use App\Http\Controllers\GfGController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\resultController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\timetable;
use App\Http\Controllers\userinfo;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::get('/dashboard', function () {
//     return view('login');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/resetPassword', function(){
    return view('profile.partials.update-password-form');})->name('Reset.pass');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/Reset', [userinfo::class,'reset'])->name('ResetPass');

    Route::match(['GET','POST'], '/Profile', [userinfo::class, 'showProfile'])->name('Profile');

    Route::get('/ExamDateSheet', [ExamDateSheetController::class,'showDateSheet'])->name("getDateSheet");

    Route::post('/storeEvent', [EventController::class,'storeEvent'])->name('storeEvent');

    Route::get('/events', [EventController::class, 'showEvent'])->name('events.show');

    






//     Route::get('/Reset', function () {return view('common.reset');})->name('ResetPass');

// Route::get('/Profile', [userinfo::class,'showProfile'])->name('Profile');




});

require __DIR__.'/auth.php';




Route::middleware(['auth', 'admin'])->group(function () { 

    Route::get('/updateTimeTable/{id}',[AdminController::class,'fetchData2'])->name('updateTable');



    Route::get('/admin/timetable', [AdminController::class, 'index']);
Route::post('/admin/timetable', [AdminController::class, 'getTimetable']);
Route::get('/admin/batches/{courseId}', [AdminController::class, 'getBatchess']);



    Route::get('/addTimeTable/{day}',[AdminController::class,'fetchData'])->name('addTable');

    Route::match(['get', 'post'],"/admin/TimeTable", [AdminController::class,"showTimeTable"])->name('adminTimeTable');

    Route::get('/get-batches/{courseId}', [AdminController::class, 'getBatches']);

    Route::post('/addTimeTableData',[AdminController::class,'addTimeTable'])->name('addTimeTable');

    Route::post('/updateTimeTableData/{id}',[AdminController::class,'updateTimeTable'])->name('updateTimeTable');

    Route::delete('/deleteTimeTableData/{id}',[AdminController::class,'deleteTimeTable'])->name('deleteTable');

    Route::get('/cancel', function(){return view('admin.addDepartment');})->name('cancelTB');

    Route::get('/addDepartment', function () {return view('admin.addDepartment');})->name('DepartmentForm');
    
    Route::post('/addDepartment/Save',[AdminController::class,'addDepartment'])->name('DepartmentSave');
    
    Route::get('/addCourse', [AdminController::class,'getAllDepartmentNames'])->name('CourseForm');
    
    Route::post('/addCourse/Save',[AdminController::class,'addCourse'])->name('CourseSave');
    
    Route::get('/addBatch', [AdminController::class,'getAllCourseNames'])->name('BatchForm');
    
    Route::post('/addBatch/Save',[AdminController::class,'addBatch'])->name('BatchSave');
    
    Route::match(['get', 'post'],'/addSubject', [AdminController::class, 'getAllDepartmentNames2'])->name('SubjectForm');
    
    Route::post('/addSubject/Save', [AdminController::class, 'addSubject'])->name('SubjectSave');

    Route::post('/getTeachers', [AdminController::class, 'getTeachers'])->name('getTeachers');

   Route::post('/fetch-courses', [AdminController::class, 'fetchCourses'])->name('getCourses');

   Route::post('/fetch-subjects', [AdminController::class, 'fetchSubjects'])->name('getsubjects');

   Route::post('/fetch-batchs', [AddUserController::class,'fetchBatch'])->name('getBatch');

   Route::post('/addTeacher/Save', [AddUserController::class, 'addTeacher'])->name('TeacherSave');

   Route::match(['get', 'post'],'/addTeacher', [AddUserController::class,'fetchDepartment'])->name('TeacherForm');

   Route::post('/addStudent/Save', [AddUserController::class, 'addStudent'])->name('StudentSave');

  Route::match(['get', 'post'],'/Student/TimeTable',[AddUserController::class,'fetchCourse2'])->name('StudentForm');

   Route::get('/addAdmin', [AddUserController::class, 'createAdmin'])->name('AdminForm');

   Route::post('/addAdmin/save', [AddUserController::class, 'storeAdmin'])->name('AdminSave');


   Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('events/create',  function(){ return view("event.addEvent");})->name('events.create');

   }); 

//    Route::get('/update/profile', function(){ return view('admin.updateprofile');})->name('updateprofile');

   Route::get('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

   Route::delete('/delete-user', [AdminController::class, 'deleteUser'])->name('deleteUser');

   Route::get('/admin/updateAttendance', [AttendanceController::class, 'updateAttendance'])->name('admin.updateAttendance');




//    Route::get('/addAdmin',[AdminController::class,'fetchDepartment2'])->name('addAdmin');

//    Route::post('/addAdmin/Save', [AddUserController::class, 'addAdmin'])->name('AdminSave');

   // web.php

   
// Route::get('/addAdmin/demo', [GfGController::class, 'demoAdmin'])->name('AdminFormDemo');
// Route::post('/addAdmin/demo2', [GfGController::class, 'demoAdmin2'])->name('AdminSaveDemo');

});

Route::middleware(['auth', 'teacher'])->group(function () {

    Route::get('/Teacher/TimmeTable/{day?}', [teacherController::class,'showTimeTable'])->name('teacherTimeTable');

    Route::get('/take-attendance/{id}', [teacherController::class, 'takeAttendance'])->name('takeAttendance');

    Route::post('/submit-attendance', [teacherController::class, 'submitAttendance'])->name('submitAttendance');

    Route::get('/Teacher/cancel/{day?}', [teacherController::class,'showTimeTable'])->name('cancelT');

    Route::get('/Attendance', [teacherController::class,'autoSelected'])->name('autoSelectedBatch');

    Route::get('/CreateDateSheet/{batchId?}', [teacherController::class,'CreateDateSheet'])->name('CreateDateSheet');

    Route::post('/storeDateSheet', [teacherController::class,'storeDateSheet'])->name('storeDateSheet');

    Route::get('/results/teacher/{Student_id?}/{batch_id?}/{subject_d?}', [resultController::class, 'showResultAllStudent'])->name('showResultAllStudent'); 

    Route::prefix('teacher')->name('teacher.')->group(function () {
        Route::get('events/create', function(){ return view("event.addEvent");})->name('events.create');

    });    


});

Route::middleware(['auth', 'student'])->group(function () {

    Route::get('/attendance',[studentController::class,'showattendance'])->name('sAttendance');

    // Route::get('/home',[timetable::class,'showTimeTable']);
    Route::get('/Student/cancel/{day?}', [studentController::class,'showTimeTable'])->name('cancelS');

    Route::get('/timetable/{day?}', [studentController::class,'showTimeTable'])->name('studentTimeTable');

    Route::get('/results/{semester?}', [resultController::class, 'showResult'])->name('showResult'); 

});





// routes/web.php








Route::get('/welcome', function () {return view('welcome');});


//////////////////////demooooooooooooooooooo









// Route::get('/demo', function () {
//     return view('demo');
// })->name('Demo');


