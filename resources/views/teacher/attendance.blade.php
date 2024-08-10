@extends('teacher.layout')

@section('heading')
<div class="font-bold text-xl text-green-600">Attendance</div>
@endsection

@section('content')
<div class="p-4 w-full h-full">
    <form action="{{ route('submitAttendance') }}" method="POST" id="attendance-form" class="h-full ">
        @csrf
        <input type="hidden" name="teacher_id" value="{{ $timeTableEntry->teacher_id }}">
        <input type="hidden" name="subject_id" value="{{ $timeTableEntry->subject_id }}">
        <input type="hidden" name="course_id" value="{{ $timeTableEntry->course_id }}">
        <input type="hidden" name="batch_id" value="{{ $timeTableEntry->batch_id }}">
        <input type="hidden" name="day" value="{{ $timeTableEntry->day }}">
        <input type="hidden" name="timetable_id" value="{{$timeTableEntry->id}}">

        <div class="relative overflow-x-auto shadow-md rounded-lg h-full sm:rounded-lg">
            <div class="flex items-center justify-between flex-wrap md:flex-nowrap bg-white p-4">
                <div>
                    <button id="dropdownActionButton"
                        class="inline-flex items-center text-green-600 bg-white border border-green-600 hover:bg-green-600 hover:text-white focus:ring-2 focus:ring-green-600 font-medium rounded-lg text-sm px-3 py-1.5"
                        type="button">
                        <span class="sr-only">Filter</span>
                        Filter
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-green-100 rounded-lg shadow w-44 absolute">
                        <ul class="py-1 text-sm text-white-600" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 rounded-lg"
                                    data-filter="total student">Total Student</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 rounded-lg"
                                    data-filter="present">Present</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 rounded-lg"
                                    data-filter="absent">Absent</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                    <span class="mr-4 text-green-600 font-bold">Total Students: <span id="totalStudents">0</span></span>
                    <span class="mr-4 text-green-600 font-bold">Present: <span id="presentCount">0</span></span>
                    <span class="mr-4 text-green-600 font-bold">Absent: <span id="absentCount">0</span></span>
                </div>
                <label for="table-search-users" class="sr-only text-green-600">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block p-2 ps-10 text-sm text-green-600 border border-green-600 rounded-lg w-80 bg-green-50 focus:ring-green-600 focus:border-green-600"
                        placeholder="Search by ID or Name">
                </div>
            </div>
            <table class="w-full text-md text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-500 uppercase bg-green-100">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" onclick="toggleSelectAll()"
                                    class="bg-breen-600 rounded border-green-300 text-green-600 shadow-sm focus:ring-0">
                                <label for="checkbox-all-search" class="custom-checkbox"></label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Subject</th>
                        <th scope="col" class="px-6 py-3">Batch</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="{{ $student->id }}" type="checkbox"
                                        name="attendance[{{ $student->id }}]" value="true" class="bg-breen-600 rounded border-green-300 text-green-600 shadow-sm focus:ring-0">
                                    <input type="hidden" id="hidden-{{ $student->id }}" name="attendance[{{ $student->id }}]" value="false" />
                                    <label for="{{ $student->id }}" class="custom-checkbox"></label>
                                </div>
                            </td>
                            <th scope="row" class="flex items-center px-6 py-2 text-gray-500 whitespace-nowrap">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $student->first_name }}</div>
                                    <div class="font-normal text-gray-500">{{ $student->id }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-2">{{ $timeTableEntry->subject_name }}</td>
                            <td class="px-6 py-2">{{ $timeTableEntry->batch }}</td>
                            <label for="remember_me" class="inline-flex items-center">
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="m-4">
                <button type="submit" class="bg-green-700 hover:bg-green-800 text-white py-2 px-4 rounded-lg">
                    Submit Attendance
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('css')
    <style>
    .Attendance {
        background-color: #057A55;
        color: white;
    }
    .TimeTable {
        background-color: white;
        color: #057A55;
    }
    .Attendance:hover{
        background-color: #057A55;
    }
    .TimeTable:hover{
        background-color: rgb(243 244 246);
    }   
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            updateAttendanceCount();

            document.querySelectorAll('tbody input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', (event) => {
                    const studentId = event.target.id;
                    const hiddenInput = document.getElementById('hidden-' + studentId);
                    hiddenInput.value = event.target.checked ? 'true' : 'false';
                    updateAttendanceCount();
                });
            });

            document.querySelector('form').addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });

            const dropdownButton = document.getElementById('dropdownActionButton');
            const dropdownMenu = document.getElementById('dropdownAction');

            dropdownButton.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function (event) {
                if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            document.querySelectorAll('#dropdownAction a').forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    const filterType = this.dataset.filter;
                    filterData(filterType);
                    dropdownMenu.classList.add('hidden'); // Hide the dropdown after selecting an option
                });
            });

            document.getElementById('table-search-users').addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                document.querySelectorAll('tbody tr').forEach(row => {
                    const studentId = row.querySelector('div.font-normal').innerText.toLowerCase();
                    const name = row.querySelector('div.text-base').innerText.toLowerCase();
                    if (studentId.includes(searchTerm) || name.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        function selectAll(checked) {
            document.querySelectorAll('tbody input[type="checkbox"]').forEach(checkbox => checkbox.checked = checked);
            document.querySelectorAll('tbody input[type="hidden"]').forEach(hiddenInput => hiddenInput.value = checked ? 'true' : 'false');
            updateAttendanceCount();
        }

        function toggleSelectAll() {
            const selectAllCheckbox = document.getElementById('checkbox-all-search');
            selectAll(selectAllCheckbox.checked);
        }

        function updateAttendanceCount() {
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            const totalStudents = checkboxes.length;
            const presentCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
            const absentCount = totalStudents - presentCount;

            document.getElementById('totalStudents').textContent = totalStudents;
            document.getElementById('presentCount').textContent = presentCount;
            document.getElementById('absentCount').textContent = absentCount;
        }

        function filterData(filterType) {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const checkbox = row.querySelector('input[type="checkbox"]');
                if (filterType === 'total student') {
                    row.style.display = '';
                } else if (filterType === 'present') {
                    row.style.display = checkbox.checked ? '' : 'none';
                } else if (filterType === 'absent') {
                    row.style.display = !checkbox.checked ? '' : 'none';
                }
            });
        }
   
        $(document).ready(function () {
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            
        };
            $('#attendance-form').on('submit', function (event) {
                event.preventDefault(); 

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log('Success response:', response);
                        toastr.success(response.message || 'Attendance submitted successfully');
                        setTimeout(function() {
                            window.location.href = "{{ route('teacherTimeTable', ['day' => $timeTableEntry->day]) }}";
                        }, 2000); 
                    },
                    error: function (xhr, status, error) {
                        console.error('Error response:', xhr.responseText);

                        let errorMessage = 'An error occurred.';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = Object.values(xhr.responseJSON.errors).flat(); // Flatten nested errors
                            errorMessage = errors.join('<br>');
                        }
                        toastr.error(errorMessage);
                    }
                });
            });
        });

    </script>
@endpush


