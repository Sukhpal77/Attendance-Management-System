@extends($userrole . '.layout')

@section('heading')
@if($userrole == "student")
    <div class="text-xl text-green-600 font-extrabold flex flex-row items-center">
        Semester -
        <ul class="relative">
            <li class="inline-block">
                <button id="dropdownSemesterButton" 
                    class="flex items-center justify-between w-full text-green-600 rounded focus:outline-none">
                    <span id="dropdownSemesterText">{{ $Semester ?? "Select Semester" }}</span>
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="dropdownSemesterMenu"
                    class="w-36 max-h-40 dropdown-menu z-10 hidden font-normal absolute bg-white divide-y divide-gray-100 rounded-lg shadow overflow-scroll no-scrollbar">
                    <ul class="py-2 text-sm text-green-600" aria-labelledby="dropdownSemesterButton">
                        @if($semesters->isEmpty())
                            <li>
                                <a href="#" class="block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">No Semester</a>
                            </li>
                        @else
                            @foreach($semesters as $sem)
                                <li>
                                    <a href="{{ route('showResult', ['semester' => $sem]) }}"
                                        class="block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">{{ $sem }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </li>
        </ul>
    </div>
@else
    <div class="text-xl text-green-600 font-extrabold flex flex-row items-center">
        Batch -
        <label for="batch" class="block text-sm font-medium leading-6 text-green-600">Batch</label>
        <div class="relative mt-2">
            <button id="dropdownBatchButton"
                class="text-white w-full bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                type="button">
                Select Batch
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <input type="hidden" id="selectedBatch" name="batch_id">
            <div id="dropdownBatchMenu" class="dropdown-menu max-h-32 min-w-20 overflow-scroll no-scrollbar">
                <ul class="py-2 text-sm text-gray-700">
                    @if($batches->isEmpty())
                        <li>
                            <a href="#" class="block px-4 py-2 text-gray-600 hover:text-white hover:bg-green-600 rounded-lg">No Batch</a>
                        </li>
                    @else
                        @foreach($batches as $batch)
                            <li>
                                <a href="{{ route('showResult', ['batch' => $batch->id]) }}" 
                                    class="block px-4 py-2 text-gray-600 hover:text-white hover:bg-green-600 rounded-lg" data-value="{{ $batch->id }}">
                                    {{ $batch->batch_name }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
   
    <div class="searchStudentID mt-4">
        <form action="{{ route('showResult') }}" method="GET">
            <label for="table-search-users" class="sr-only text-green-600">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users" name="query"
                    class="block p-2 pl-10 text-sm text-green-600 border border-green-600 rounded-lg w-80 bg-green-50 focus:ring-green-600 focus:border-green-600"
                    placeholder="Search by ID or Name">
            </div>
            <button type="submit"
                class="ml-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">Search</button>
        </form>
    </div>
@endif
@endsection

@section('content')
<div class="main w-full h-full">
    <div class="w-full flex px-10 pb-7">
        <div class="sm:px-6 bg-gray-300 rounded-lg">
            <h3 class="text-lg leading-6 font-medium text-white pt-4">Student Information</h3>

            <div class="flex flex-col border-t border-gray-200">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-x-6 gap-y-2 p-6">
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Student ID : <span>{{ $student->id }}</span>
                        </div>
                    </div>
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Student Name : <span>{{ $student->name }}</span>
                        </div>
                    </div>
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Father's Name :
                            <span>{{ $student->father_name }}</span>
                        </div>
                    </div>
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Mother's Name :
                            <span>{{ $student->mother_name}}</span>
                        </div>
                    </div>
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Course Name : <span>{{ $courseName }}</span>
                        </div>
                    </div>
                    <div class="sm:row-span-1">
                        <div class="text-sm font-medium text-gray-500">Total CGPA : <span>{{ $totalCGPA }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full max-w-5xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="flex flex-col w-full max-w-5xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 bg-green-600 flex justify-evenly">
                <h3 class="text-lg leading-6 font-medium text-white">Results</h3>
                <h3 class="text-lg leading-6 font-medium text-white">SGPA<span>{{ $totalSGPA }}</span></h3>
                @if($userrole == "teacher")
                    <div class="inline">
                        <label for="Subject" class="block text-sm font-medium leading-6 text-green-600">Subject</label>
                        <div class="relative mt-2">
                            <button id="dropdownSubjectButton"
                                class="text-white w-full bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                type="button">
                                Select Subject
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <input type="hidden" id="selectedSubject" name="subject_id">
                            <div id="dropdownSubjectMenu" class="dropdown-menu max-h-32 min-w-20 overflow-scroll no-scrollbar">
                                <ul class="py-2 text-sm text-gray-700">
                                    @if($subjects->isEmpty())
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-gray-600 hover:text-white hover:bg-green-600 rounded-lg">No Subject</a>
                                        </li>
                                    @else
                                        @foreach($subjects as $subject)
                                            <li>
                                                <a href="{{ route('showResult', ['subject' => $subject->id]) }}" 
                                                    class="block px-4 py-2 text-gray-600 hover:text-white hover:bg-green-600 rounded-lg" data-value="{{ $subject->id }}">
                                                    {{ $subject->subject_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="flex flex-col border-t border-gray-200 p-6">
            <div class="overflow-x-auto rounded-t-lg">
                <table class="w-full bg-white">
                    <thead class="bg-gray-300 rounded-lg">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Subject Code</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Subject Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Credits</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Grade</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 overflow-y-auto max-h-56">
                        @foreach($results as $result)
                            <tr class="hover:bg-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $result->subject_code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $result->subject_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $result->credits }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $result->grade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('css2')
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .dropdown-menu.show {
            display: block;
        }
        .Result {
        background-color: #057A55;
        color: white;
        }
        .TimeTable {
            background-color: white;
            color: #057A55;
        }
        .Result:hover{
            background-color: #057A55;
        }
        .TimeTable:hover{
            background-color: rgb(243 244 246);
        }    
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setupDropdown('dropdownSemesterButton', 'dropdownSemesterMenu');
            setupDropdown('dropdownBatchButton', 'dropdownBatchMenu');
            @if($userrole == "teacher")
                setupDropdown('dropdownSubjectButton', 'dropdownSubjectMenu');
            @endif
        });

        function setupDropdown(buttonId, menuId) {
            const button = document.getElementById(buttonId);
            const menu = document.getElementById(menuId);

            button.addEventListener('click', function () {
                menu.classList.toggle('show');
            });

            document.addEventListener('click', function (event) {
                if (!button.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.remove('show');
                }
            });
        }
    </script>
@endpush
