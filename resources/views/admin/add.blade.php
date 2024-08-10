@extends('admin.layout')

@section('heading')
<div class="font-bold text-xl  text-green-600 ">
    <spam class="font-extrabold text-4xl">Add Data
</div>
@endsection
@section('content')

<div class="w-full h-5/6 flex flex-col justify-center items-center">

    <div class="mx-56 w-5/6 flex flex-row justify-evenly items-center pd-16">
        <button
            class="Student day-button monday text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg h-10 me-2 mb-2"
            data-day="Student"><a href="{{ route('StudentForm') }}"
                class="Student w-full h-full text-sm px-5 py-2.5 text-center  text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                Student </a></button>

        <button
            class="Teacher day-button tuesday text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm h-10 text-center me-2 mb-2"
            data-day="Teacher"> <a href="{{ route('TeacherForm') }}"
                class=" Teacher w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                teacher </a></button>

        <button
            class="Course day-button thursday text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm h-10 text-center me-2 mb-2"
            data-day="Course"><a href="{{ route('CourseForm') }}"
                class="Course w-full h-full text-sm px-5 py-2.5 text-center  text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                Course </a></button> 
                
        <button
            class="Department day-button thursday text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm h-10 text-center me-2 mb-2"
            data-day="Department"><a href="{{ route('DepartmentForm') }}"
                class="Department w-full h-full text-sm px-5 py-2.5 text-center  text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                Department </a></button> 

        <button
            class="Subject day-button wednesday text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm h-10 text-center me-2 mb-2"
            data-day="Subject"><a href="{{ route('SubjectForm') }}"
                class="Subject w-full h-full text-sm px-5 py-2.5 text-center  text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                Subject </a></button>

        <button
            class="Batch day-button thursday text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm h-10 text-center me-2 mb-2"
            data-day="Batch"><a href="{{ route('BatchForm') }}"
                class="Batch w-full h-full text-sm px-5 py-2.5 text-center  text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                Batch</a></button> 
                
    </div>
    
    @yield('info')

</div>



@endsection

@push('css')
<style>
    .Add {
        background-color: #057A55;
        color: white;
    }
    .TimeTable{
        background-color: white;
        color: #057A55;
    }
    .Add:hover{
        background-color: #057A55;
    }
    .TimeTable:hover{
        background-color: rgb(243 244 246);
    }
</style>
@endpush


