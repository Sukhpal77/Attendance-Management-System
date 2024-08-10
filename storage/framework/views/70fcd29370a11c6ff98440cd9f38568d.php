<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('css'); ?>

    <style>
        .dropdown-menu {
            display: none; 
        }
        /* .dropdown:hover .dropdown-menu {
            display: block; 
        } */
    </style>

</head>

<body class="w-full h-screen p-1 ">
    <div class="w-full h-full flex flex-row ">

        <nav class=" w-1/6 h-full shadow-2xl rounded-lg content-between flex flex-col items-center shadow-green-700 ">
            <div class=" w-20 my-4 cursor-pointer font-bold text-xl text-green-600 ">
            <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo">
            </div>
            <div class="flex flex-col my-16 w-full items-center">
                <div class="sAttendance cursor-pointer  font-bold text-xl text-green-600 w-full h-16 rounded-lg "><a
                        href=<?php echo e(route('sAttendance')); ?>

                        class="w-full h-full text-center items-center justify-evenly flex">Attendance</a></div>
                <div class="sTimeTable cursor-pointer font-bold text-xl text-white bg-green-600 w-full h-16 rounded-lg"><a
                        href=<?php echo e(route('sTimeTable')); ?>

                        class="w-full h-full text-center items-center justify-evenly flex ">TimeTable</a></div>

                <div class="sEvent cursor-pointer  font-bold text-xl text-green-600 w-full h-16 rounded-lg "><a
                        href=<?php echo e(route('sAttendance')); ?>

                        class="w-full h-full text-center items-center justify-evenly flex">Events</a></div>

                <div class="sDataSheet cursor-pointer  font-bold text-xl text-green-600 w-full h-16 rounded-lg "><a
                        href=<?php echo e(route('sAttendance')); ?>

                        class="w-full h-full text-center items-center justify-evenly flex">DataSheet</a></div>
                        
                <div class="sResult cursor-pointer  font-bold text-xl text-green-600 w-full h-16 rounded-lg "><a
                        href=<?php echo e(route('sAttendance')); ?>

                        class="w-full h-full text-center items-center justify-evenly flex">Result</a></div>        

            </div>
            <div class=" mt-28 cursor-pointer font-bold text-xl text-green-600 items-center justify-center ">Logout
                <div class="w-14 p-2 flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        strokeWidth={1.5} stroke="green" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                </div>
            </div>
        </nav>

        <div class=" w-5/6 h-full flex flex-col items-center ">
            <div class="header w-full h-1/6 ">
                <div class=" w-full h-3/5 flex flex-row justify-between p-5 ">
                    <?php echo $__env->yieldContent('heading', 'Default content'); ?>
                    <div class="flex flex-row items-center ">
                        <div class="flex flex-col items-end content-center ">
                            <div class="text-green-600 font-bold ">Sukhpal Singh</div>
                            <div class="text-green-600  font-bold">Student</div>
                        </div>


                        <div class="relative w-16 dropdown">
                            <!-- Icon -->
                            <svg id="profile-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" class="w-14 h-14 cursor-pointer">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd"/>
                            </svg>

                            <!-- Dropdown Menu -->
                            <div id="dropdown-menu" class="z-10 absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg dropdown-menu">
                                <ul class="py-2">
                                    <li>
                                        <a href="/profile" class="block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">Profile</a>
                                    </li>
                                    <li>
                                        <a href="/reset-password" class="block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">Reset Password</a>
                                    </li>
                                    <li>
                                        <a href="/logout" class="block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <?php echo $__env->yieldContent('content', 'Default content'); ?>
        </div>
    </div>
    <?php echo $__env->yieldPushContent('Js'); ?>

<!--JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const icon = document.getElementById('profile-icon');
        const menu = document.getElementById('dropdown-menu');

        function showDropdown() {
            menu.style.display = 'block';
        }

        function hideDropdown() {
            menu.style.display = 'none';
        }

        icon.addEventListener('click', function(event) {
            event.stopPropagation(); 
            if (menu.style.display === 'block') {
                hideDropdown();
            } else {
                showDropdown();
            }
        });

        document.addEventListener('click', function(event) {
            if (!icon.contains(event.target) && !menu.contains(event.target)) {
                hideDropdown();
            }
        });

        menu.addEventListener('mouseenter', function() {
            showDropdown();
        });

        menu.addEventListener('mouseleave', function() {
            hideDropdown();
        });
    });
</script>

</body>

</html><?php /**PATH D:\laravel project\attendance-Management\resources\views/students/layout.blade.php ENDPATH**/ ?>