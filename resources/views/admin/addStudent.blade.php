@extends('admin.add')

@section('info')

<form class="w-5/6 h-5/6 justify-center items-center flex rounded-lg shadow-xl  bg-blend-lighten"
    action="{{ route('StudentSave') }}" method="POST" id="StudentForm">
    @csrf
    <input type="hidden" name="id" value="{{ $id ?? null }}" name="id">
    <div class="w-3/5 h-full flex flex-col justify-center items-center  ">

        <div class="flex flex-col border-green-60 overflow-y-scroll overflow-x-hidden no-scrollbar">
            <h1 class="text-xl font-semibold leading-7 text-green-600 pt-7 ">Students Information</h1>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class=" sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-green-600">First
                        name</label>
                    <div class="mt-2">
                        <input type="text" name="first_name" id="first-name" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class=" sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-green-600">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="last_name" id="last-name" autocomplete="family-name"
                            class="block w-full rounded-md border-0 border-green-600 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class=" sm:col-span-3">
                    <label for="mother-name" class="block text-sm font-medium leading-6 text-green-600">Mother
                        name</label>
                    <div class="mt-2">
                        <input type="text" name="mother-name" id="first-name" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class=" sm:col-span-3">
                    <label for="father-name" class="block text-sm font-medium leading-6 text-green-600">Father name</label>
                    <div class="mt-2">
                        <input type="text" name="father-name" id="last-name" autocomplete="family-name"
                            class="block w-full rounded-md border-0 border-green-600 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class=" sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-green-600">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class=" col-span-2">
                    <label for="semester" class="block text-sm font-medium leading-6 text-green-600">Semester
                        (Only no.)</label>
                    <div class="mt-2">
                        <input type="number" name="semester" id="mob-number" autocomplete="mob-number"
                            class="block w-full rounded-md border-0 border-green-600 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 remove-arrow">
                    </div>
                </div>

                <div class=" sm:col-span-3">
                    <label for="course" class="block text-sm font-medium leading-6 text-green-600">Course</label>
                    <div class="relative mt-2">
                        <button id="dropdownCourseButton"
                            class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                            type="button">
                            Select Course
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <input type="hidden" id="selectedCourse" name="course_id">
                        <div id="dropdownCourseMenu"
                            class="dropdown-menu max-h-32 min-w-20 overflow-scroll no-scrollbar">
                            <ul class="py-2 text-sm text-gray-700">
                                @foreach ($courses as $course)
                                    <li>
                                        <a href="#"
                                            class="w-full block px-4 py-2 hover:bg-green-600 rounded-lg dropdown-item hover:text-white"
                                            data-value="{{$course->id }}">{{ $course->course_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class=" sm:col-span-3">
                    <label for="batch" class="block text-sm font-medium leading-6 text-green-600">Batch</label>
                    <div class="relative mt-2">
                        <button id="dropdownBatchButton"
                            class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                            type="button">
                            Select Batch
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <input type="hidden" id="selectedBatch" name="batch_id">
                        <div id="dropdownBatchMenu"
                            class="dropdown-menu max-h-32 min-w-20 overflow-scroll no-scrollbar ">
                            <ul class="py-2 text-sm text-gray-700">
                               
                            </ul>
                        </div>
                    </div>
                </div>


                <div class=" col-span-3">
                    <label for="mob-number" class="block text-sm font-medium leading-6 text-green-600">Mobile
                        Number</label>
                    <div class="mt-2">
                        <input type="number" name="number" id="mob-number" autocomplete="mob-number"
                            class="block w-full rounded-md border-0 border-green-600 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 remove-arrow">
                    </div>
                </div>


                <div class=" col-span-3">
                    <label for="Group" class="block text-sm font-medium leading-6 text-green-600">Group</label>
                    <div class="relative flex flex-row py-5 gap-10 pl-5 ">
                        <div class="relative flex items-center ">
                            <input id="groupA" type="radio" value="A" name="group"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-green-600 focus:ring-green-600">
                            <label for="groupA" class="ms-2 text-sm font-medium text-green-600">Group A</label>
                        </div>
                        <div class="relative flex items-center">
                            <input id="groupB" type="radio" value="B" name="group"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-green-600 focus:ring-green-600">
                            <label for="groupB" class="ms-2 text-sm font-medium text-green-600">Group B</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="street-address" class="block text-sm font-medium leading-6 text-green-600">Street
                        address</label>
                    <div class="mt-2">
                        <input type="text" name="street_address" id="street-address" autocomplete="street-address"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-green-600">City</label>
                    <div class="mt-2">
                        <input type="text" name="city" id="city" autocomplete="address-level2"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-green-600">State /
                        Province</label>
                    <div class="mt-2">
                        <input type="text" name="state" id="region" autocomplete="address-level1"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium leading-6 text-green-600">ZIP / Postal
                        code</label>
                    <div class="mt-2">
                        <input type="text" name="pincode" id="postal-code" autocomplete="postal-code"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-grreen-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>


                <div class="sm:col-span-full flex justify-end gap-x-6 pt-7 pb-7">
                    <div >
                <input type="hidden" value="student" name="role" id="role">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900 ">
                        <a href="{{ route('StudentForm') }}"
                            class="rounded-md text-green-500 px-3  py-2 text-sm font-semibold hover:text-white hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Reset</a>
                    </button>
                    <button type="submit" id="saveButton"
                        class="rounded-md bg-green-600 px-3  py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Save</button>
                </div>
                </div>
            </div>

        </div>

    </div>
</form>

@endsection

@push('css2')
    <style>
        .Student {
            background-color: #057A55;
            color: white;
        }

        .Teacher {
            background-color: white;
            color: #057A55;
        }

        .Subject {
            background-color: white;
            color: #057A55;
        }

        .Course {
            background-color: white;
            color: #057A55;
        }

        .Batch {
            background-color: white;
            color: #057A55;
        }

        .Department {
            background-color: white;
            color: #057A55;

        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.25rem;
            z-index: 1000;
        }

        .dropdown-menu.show {
            display: block;
        }

        .fbtn {
            margin-left: 465px;
        }
    </style>
@endpush

@push('js')
    <script>
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
            $('#StudentForm').on('submit', function (event) {
                event.preventDefault(); // Prevent the form from submitting normally

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log('Success response:', response);
                        toastr.success(response.message || 'Admin added successfully');
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


        document.addEventListener('DOMContentLoaded', function () {
            setupDropdowns();
        });

        function setupDropdowns() {
            setupDropdown('dropdownCourseButton', 'dropdownCourseMenu', 'selectedCourse', fetchBatchs);
            setupDropdown('dropdownBatchButton', 'dropdownBatchMenu', 'selectedBatch');
        }

        function setupDropdown(buttonId, menuId, hiddenInputId, onSelectCallback) {
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
                    if (onSelectCallback) {
                        onSelectCallback(value);
                    }
                }
            });

            document.addEventListener('click', function (event) {
                if (!button.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.remove('show');
                }
            });
        }

        function fetchBatchs(courseId) {
            fetch('{{ route("getBatch") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ courseId: courseId }),
            })
                .then(response => response.json())
                .then(data => {
                    const dropdownMenu = document.getElementById('dropdownBatchMenu').querySelector('ul');
                    dropdownMenu.innerHTML = ''; // Clear existing options
                    if (data.batchs.length === 0) {
                        dropdownMenu.innerHTML = '<li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-green-600 dropdown-item hover:text-white" data-value="">No data</a></li>';
                    } else {
                        data.batchs.forEach(batch => {
                            const li = document.createElement('li');
                            li.innerHTML = `<a href="#" class="block px-4 py-2 rounded-lg hover:bg-green-600 dropdown-item hover:text-white" data-value="${batch.id}">${batch.name}</a>`;
                            dropdownMenu.appendChild(li);
                        });
                    }

                    // Ensure dropdown is updated after fetching courses
                    document.getElementById('dropdownBatchButton').innerHTML = 'Select Batch <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" /></svg>';
                })
                .catch(error => console.error('Error fetching Batch:', error));
        }



    </script>
@endpush