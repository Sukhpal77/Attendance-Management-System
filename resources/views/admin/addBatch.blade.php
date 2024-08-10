@extends('admin.add')

@section('info')

<form class="w-5/6 h-5/6 justify-center items-center flex rounded-lg shadow-xl bg-blend-lighten"
    action="{{ route('BatchSave') }}" method="POST" id="BatchForm">
    @csrf
    <div class="w-full flex flex-row justify-center items-center border-b border-green-600 py-10 ">
        <div>
            <img src="img/clg.png" alt="">
        </div>

        <div class="w-1/2 px-10 ">
            <h1 class="text-lg font-semibold leading-7 text-green-600">Add Batch</h1>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="batch-name" class="block text-sm font-medium leading-6 text-green-600">Batch
                        Name</label>
                    <div class="mt-2">
                        <input type="text" name="batch_name" id="batch-name" autocomplete="batch-name"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="course" class="block text-sm font-medium leading-6 text-green-600">Course</label>
                    <div class="relative mt-2">
                        <button id="dropdownDepartmentButton"
                            class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                            type="button">
                            Select Course
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <input type="hidden" id="selectedDepartment" name="course">
                        <div id="dropdownDepartmentMenu" class="dropdown-menu min-w-32 overflow-y-scroll no-scrollbar">
                            <ul class="py-2 text-sm text-gray-700">
                                @foreach ($courses as $course)
                                    <li>
                                        <a href="#"
                                            class="w-full block px-4 py-2 hover:bg-green-600 dropdown-item rounded-lg hover:text-white"
                                            data-value="{{ $course->id }}">{{ $course->course_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900 ">
                    <a href="{{ route('BatchForm') }}"
                        class="rounded-md text-green-500 px-3  py-2 text-sm font-semibold hover:text-white hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Reset</a>
                </button>
                <button type="submit" id="saveButton"
                    class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Save</button>
            </div>
        </div>
    </div>
</form>

@endsection

@push('css2')
    <style>
        .Student {
            background-color: white;
            color: #057A55;
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
            background-color: #057A55;
            color: white;
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
            $('#BatchForm').on('submit', function (event) {
                event.preventDefault(); 

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
            setupDropdown('dropdownDepartmentButton', 'dropdownDepartmentMenu', 'selectedDepartment');
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

        
    </script>

@endpush
