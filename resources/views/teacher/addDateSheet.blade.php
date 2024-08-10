@extends('teacher.layout')

@section('heading')
<div class="font-bold text-xl text-green-600">Class -
    <span class="font-extrabold">{{ $batch->batch_name ?? 'No Batch Selected' }}</span>
</div>
@endsection

@section('content')
<div class="w-full h-5/6 flex justify-center content-center  ">
    <div class="flex flex-col w-full h-4/6  max-w-5xl my-10 mx-auto bg-white shadow-lg rounded-lg ">
        <div class="px-4 py-5 sm:px-6 bg-green-600 rounded-t-lg ">
            <h3 class="text-xl leading-6 font-medium text-white">
                <svg class="w-16 h-20 text-white dark:text-white inline" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12.512 8.72a2.46 2.46 0 0 1 3.479 0 2.461 2.461 0 0 1 0 3.479l-.004.005-1.094 1.08a.998.998 0 0 0-.194-.272l-3-3a1 1 0 0 0-.272-.193l1.085-1.1Zm-2.415 2.445L7.28 14.017a1 1 0 0 0-.289.702v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .703-.288l2.851-2.816a.995.995 0 0 1-.26-.189l-3-3a.998.998 0 0 1-.19-.26Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M7 3a1 1 0 0 1 1 1v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h1V4a1 1 0 0 1 1-1Zm10.67 8H19v8H5v-8h3.855l.53-.537a1 1 0 0 1 .87-.285c.097.015.233.13.277.087.045-.043-.073-.18-.09-.276a1 1 0 0 1 .274-.873l1.09-1.104a3.46 3.46 0 0 1 4.892 0l.001.002A3.461 3.461 0 0 1 17.67 11Z"
                        clip-rule="evenodd" />
                </svg>
                Add Exam DateSheet
            </h3>
        </div>
        <div class="flex flex-col border-t border-gray-200 ">
            <form action="{{ route('storeDateSheet') }}" method="POST" class="p-6" id="storeDateSheet">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-6 ">

                    <!-- <div class="col-span-full flex  mr-10">
                        <svg class="w-20 h-20 text-green-600 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12.512 8.72a2.46 2.46 0 0 1 3.479 0 2.461 2.461 0 0 1 0 3.479l-.004.005-1.094 1.08a.998.998 0 0 0-.194-.272l-3-3a1 1 0 0 0-.272-.193l1.085-1.1Zm-2.415 2.445L7.28 14.017a1 1 0 0 0-.289.702v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .703-.288l2.851-2.816a.995.995 0 0 1-.26-.189l-3-3a.998.998 0 0 1-.19-.26Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M7 3a1 1 0 0 1 1 1v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h1V4a1 1 0 0 1 1-1Zm10.67 8H19v8H5v-8h3.855l.53-.537a1 1 0 0 1 .87-.285c.097.015.233.13.277.087.045-.043-.073-.18-.09-.276a1 1 0 0 1 .274-.873l1.09-1.104a3.46 3.46 0 0 1 4.892 0l.001.002A3.461 3.461 0 0 1 17.67 11Z"
                                clip-rule="evenodd" />
                        </svg>

                    </div> -->

                    <div class="sm:col-span-1">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            date</label>
                        <div class="relative max-w-sm">
                            <div class="absolute  inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker id="default-datepicker" type="text" name="exam_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                placeholder="Select date">
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            time:</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="time" id="time" name="exam_time"
                                class="bg-green-50 border border-green-500 text-green-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                min="09:00" max="18:00" value="00:00" required />
                        </div>

                    </div>

                    <div class="sm:col-span-1">
                        <label for="subject"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                        <div class="relative mt-2 max-w-sm">
                            <button id="dropdownSubjectButton"
                                class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                type="button">
                                Select Subject
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <input type="hidden" id="selectedSubject" name="Subject_id">
                            <div id="dropdownSubjectMenu"
                                class="dropdown-menu min-w-32 z-10 bg-gray-50 max-h-32 absolute shadow-xl rounded-lg overflow-scroll no-scrollbar">
                                <ul class="py-2 text-sm text-gray-700">
                                    @foreach ($subjects as $subject)
                                        <li>
                                            <a href="#"
                                                class="w-full block px-4 py-2 hover:bg-green-600 dropdown-item rounded-lg hover:text-white"
                                                data-value="{{ $subject->id }}">{{ $subject->subject_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="batch_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batch</label>
                        <input id="batch_name" name="batch_name" value="{{ $batch->batch_name ?? '' }}" readonly
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 select-input"
                            required>
                        <input type="hidden" id="batch_id" value="{{  $batch->id ?? ''  }}">
                    </div>

                    <div class="sm:col-span-1">
                        <label for="group"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group</label>
                        <div class="relative mt-2 max-w-sm">
                            <button id="dropdownGroupButton"
                                class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                type="button">
                                Select Group
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <input type="hidden" id="selectedGroup" name="group">
                            <div id="dropdownGroupMenu"
                                class="dropdown-menu min-w-32 z-10 bg-gray-50 absolute shadow-xl rounded-lg overflow-scroll no-scrollbar">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li>
                                        <a href="#"
                                            class="w-full block px-4 py-2 hover:bg-green-600 dropdown-item rounded-lg hover:text-white"
                                            data-value="A">Group A</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-full block px-4 py-2 hover:bg-green-600 dropdown-item rounded-lg hover:text-white"
                                            data-value="B">Group B</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="sm:col-span-1">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exam
                            Type</label>
                        <div class="relative mt-2 max-w-sm">
                            <button id="dropdownTypeButton"
                                class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                type="button">
                                Select Group
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <input type="hidden" id="selectedType" name="exam_type">
                            <div id="dropdownTypeMenu"
                                class="z-10 dropdown-menu min-w-32 bg-gray-50 absolute shadow-xl rounded-lg overflow-scroll no-scrollbar">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li>
                                        <a href="#"
                                            class="w-full block px-4 py-2 hover:bg-green-600 dropdown-item rounded-lg hover:text-white"
                                            data-value="Online">Online</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-full block px-4 py-2 hover:bg-green-600 dropdown-item rounded-lg hover:text-white"
                                            data-value="Offline">Offline</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 mt-7 ">
                    <a href="#" onclick="goBack()"
                        class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 mr-5 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Back</a>
                    <button type="submit"
                        class="inline-flex  justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('css2')
    <style>
        input[type="date"],
        input[type="time"] {
            background-color: #f0fdf4;
            border-color: #38a169;
            color: #22543d;
        }

        input[type="date"]:focus,
        input[type="time"]:focus {
            border-color: #38a169;
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.5);
        }

        input[type="date"]::-webkit-calendar-picker-indicator,
        input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(50%) sepia(100%) saturate(300%) hue-rotate(100deg);
        }

        .Attendance {
            background-color: #057A55;
            color: white;
        }

        .TimeTable {
            background-color: white;
            color: #057A55;
        }

        .Attendance:hover {
            background-color: #057A55;
        }

        .TimeTable:hover {
            background-color: rgb(243 244 246);
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).ready(function () {
            toastr.options = {
                "positionClass": "toast-top-center",
            };
            $('#storeDateSheet').on('submit', function (event) {
                event.preventDefault(); // Prevent the form from submitting normally

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log('Success response:', response);
                        toastr.success(response.message || 'Exam DateSheet added successfully!');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error response:', xhr.responseText);

                        let errorMessage = 'An error occurred.';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = Object.values(xhr.responseJSON.errors).flat();
                            errorMessage = errors.join('<br>');
                        }
                        toastr.error(errorMessage);
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            setupDropdown('dropdownSubjectButton', 'dropdownSubjectMenu', 'selectedSubject');
            setupDropdown('dropdownGroupButton', 'dropdownGroupMenu', 'selectedGroup');
            setupDropdown('dropdownTypeButton', 'dropdownTypeMenu', 'selectedType');
        });

        function setupDropdown(buttonId, menuId, hiddenInputId) {
            const button = document.getElementById(buttonId);
            const menu = document.getElementById(menuId);
            const hiddenInput = document.getElementById(hiddenInputId);

            button.addEventListener('click', function () {
                menu.classList.toggle('show');
            });

            menu.addEventListener('click', function (event) {
                if (event.target.tagName === 'A') {
                    const value = event.target.getAttribute('data-value');
                    const text = event.target.textContent.trim();
                    button.innerHTML = `${text} <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" /></svg>`;
                    hiddenInput.value = value;
                    menu.classList.remove('show');
                }
            });

            document.addEventListener('click', function (event) {
                if (!button.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.remove('show');
                }
            });
        }
        function goBack() {
            window.history.back();
        }

        toastr.options = {
            "positionClass": "toast-top-center",
        };
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
@endpush