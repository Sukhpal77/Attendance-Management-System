<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>


    @stack('css')
    @stack('css2')
    @stack('toast')




    <style>
        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .remove-arrow::-webkit-inner-spin-button,
        .remove-arrow::-webkit-outer-spin-button {
            -webkit-appearance: none;
            /* margin: 0; */
        }

        .remove-arrow {
            -moz-appearance: textfield;
        }

        .toast-container {
            top: 20px
        }

        .toast {
            border-radius: 30px margin-top: 20px
        }

        .toast-success {
            background-color: #057A55;
        }

        .toast-error {
            background-color: #e53e3e;
        }
    </style>


</head>

<body class="w-full h-screen p-1  ">
    <div class="w-full h-full flex flex-row ">

        <nav class=" w-1/6 h-full shadow-2xl rounded-lg content-between flex flex-col items-center  justify-around ">
            <div class=" w-20 my-4 cursor-pointer font-bold text-xl text-green-600 hover:w-24 ">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>
            <div class="flex flex-col my-16 w-full items-center">
                <div
                    class="Add cursor-pointer  font-bold sm:text-xl text-green-600 w-full h-16 rounded-lg hover:bg-gray-100 ">
                    <a href={{ route('StudentForm') }}
                        class="w-full h-full text-center items-center justify-evenly flex">ADD</a></div>
                <div
                    class="TimeTable cursor-pointer font-bold sm:text-xl text-white bg-green-600 w-full h-16 rounded-lg ">
                    <a href={{ route('adminTimeTable') }}
                        class="w-full h-full text-center items-center justify-evenly flex ">TimeTable</a></div>

                <div
                    class="Events cursor-pointer font-bold sm:text-xl text-green-600 w-full h-16 rounded-lg hover:bg-gray-100 ">
                    <a href={{ route('events.show')}}
                        class="w-full h-full text-center items-center justify-evenly flex ">Event</a></div>

                <div
                    class="UpdateProfile cursor-pointer font-bold sm:text-xl text-green-600 w-full h-16 rounded-lg hover:bg-gray-100 ">
                    <a href={{ route('admin.updateProfile')}}
                        class="w-full h-full text-center items-center justify-evenly flex ">Update Profile</a></div>

                <div
                    class="UpdateAttendance cursor-pointer font-bold sm:text-xl text-green-600 w-full h-16 rounded-lg hover:bg-gray-100 ">
                    <a href={{ route('admin.updateAttendance')}}  class="w-full h-full text-center items-center justify-evenly flex ">Update
                        Addendance</a></div>

            </div>
            <form method="POST" action="{{ route('logout') }} " id='logout '>
                @csrf
                <button type="submit" id="deleteButton"
                    class=" justify-end cursor-pointer font-bold sm:text-xl text-green-600 items-center hover:w-20 ">Logout
                    <div class="sm:w-14 p-2 flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" class="text-green-600" strokeWidth={1.5} stroke="green"
                            className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </div>
                </button>
            </form>
        </nav>

        <div class=" w-5/6 h-full flex flex-col items-center justify-center">
            <div class="header w-full h-1/6 ">
                <div class=" w-full h-3/5 flex flex-row justify-between p-5 ">

                    @yield('heading', 'Default content')

                    <div class="flex flex-row items-center ">
                        <div class="flex flex-col items-end content-center ">
                            <div class="text-green-600 font-bold ">{{ Auth::user()->name }}</div>
                            <div class="text-green-600  font-bold">{{ Auth::user()->userId }}</div>
                        </div>

                        <div class="relative w-16 dropdown">
                            <!-- Icon -->
                            <svg id="profile-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="w-14 h-14 cursor-pointer text-green-600">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div id="dropdown-menu"
                                class="z-10 absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg dropdown-menu">
                                <ul class="py-2">
                                    <li>
                                        <div
                                            class="flex   text-green-600 hover:text-white hover:bg-green-600 rounded-lg">
                                            <a href="{{ route('Profile') }}"
                                                class=" text-justify block w-full px-4 py-2  ">Profile</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="  text-green-600 hover:text-white hover:bg-green-600 rounded-lg flex ">
                                            <a href="{{ route('Reset.pass') }}"
                                                class="text-justify block w-full px-4 py-2">Reset Password</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="block  text-green-600 hover:text-white hover:bg-green-600 rounded-lg">
                                            <form method="POST" action="{{ route('logout') }} " id='logout '>
                                                @csrf
                                                <button type="submit" id="deleteButton "
                                                    class="py-2 px-4 w-full text-justify">Logout</button>
                                            </form>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="  text-green-600 hover:text-white hover:bg-green-600 rounded-lg flex ">
                                            <a href="{{ route('AdminForm') }}"
                                                class="text-justify block w-full px-4 py-2">New</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @yield('content', 'Default content')
        </div>
    </div>
    @stack('script')
    @stack('js')

    <script>
        $(document).ready(function () { // Initialize toastr
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


            $('#logout').on('submit', function (event) {

                event.preventDefault(); // Prevent the form from submitting normally

                if (confirm('Are you sure you want to logout?')) {
                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function (response) {
                            toastr.success('Logged out successfully!');
                            setTimeout(function () {
                                window.location.href = '/';
                            }, 3000);
                        },

                        error: function (xhr, status, error) {
                            toastr.error('Failed to logout. Please try again.');
                        }
                    });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const icon = document.getElementById('profile-icon');
            const menu = document.getElementById('dropdown-menu');

            function showDropdown() {
                menu.style.display = 'block';
            }

            function hideDropdown() {
                menu.style.display = 'none';
            }

            icon.addEventListener('click', function (event) {
                event.stopPropagation();
                if (menu.style.display === 'block') {
                    hideDropdown();
                } else {
                    showDropdown();
                }
            });

            document.addEventListener('click', function (event) {
                if (!icon.contains(event.target) && !menu.contains(event.target)) {
                    hideDropdown();
                }
            });

            menu.addEventListener('mouseenter', function () {
                showDropdown();
            });

            menu.addEventListener('mouseleave', function () {
                hideDropdown();
            });
        });

        document.getElementById('mob-number').addEventListener('keydown', function (event) {
            if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
                event.preventDefault();
            }
        });
    </script>


</body>

</html>