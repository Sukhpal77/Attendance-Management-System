<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Document</title>
</head>

<body class=" w-screen h-screen">
    <header class="w-full h-16 flex flex-row justify-around bg-gray-300">
        <div>
            <h1 clas="text-4xl h-full">Attendance Management</h1>
        </div>
        <div>demo</div>
    </header>
    <main class="w-full h-full overflow-y-scroll overflow-x-hidden no scrollbar">
        <div class="w-full h-5/6 from-gray-300 relative z-10">
            <img src="https://cdn-cms.f-static.com/ready_uploads/media/1722/400_5cc99b906113c.jpg" alt="bg1"
                class=" absolute w-full h-full">
            <div class="w-3/6 h-full flex flex-col justify-center items-center relative z-10">
                <h1 class=" text-4xl font-extrabold">Stay Connected, <br>Stay Informed</h1>
                <div class="w-26 h-3 bg-red z-10"></div>
                <div clas="pl-16">
                    <p class="text-3xl pl-40">Empowering college engagement</p>
                </div>
            </div>
        </div>

        <divw-full class="w-full h-5/6 flex flex-row relative" >
            <div class="h-3/6 flex flex-col">
                <div class="w-full h-full">
                    <h1 class="text-4xl font-extrabold">About The Website</h1>
                </div>
                <div>
                    <p class="text-lg">The College Attendance Management website warmly welcomes you! With our system,
                        you can effortlessly monitor
                        attendance, access timetables, keep up with events, check paper datesheets, and efficiently
                        handle various academic
                        and administrative responsibilities. This user-friendly platform is tailored to aid students,
                        teachers, and college
                        staff in maintaining organizational efficiency and staying informed.</p>
                </div>
            </div>
            <div class="w-3/6 h-full">
                <img src="https://cdn-cms.f-static.com/ready_uploads/media/14903/400_5cdad95d0d89e.jpg" alt="bg2" class="w-3/6 h-3/6 ">
            </div>
        </div>

        <div class="w-full h-5/6 ">
            <div><img src="" alt=""></div>
            <div>
                <div>
                    <h1>Why Choose Our System?</h1>
                </div>
                <div>
                    <p>Efficiency and Organization at Your Fingertips</p>
                </div>
            </div>
        </div>

        <div>
            <div>
                <h1>Services</h1>
            </div>
            <div>
                <div>
                    <div>img</div>
                    <h1>Event Updates</h1>
                    <p>Stay informed about upcoming college events, activities, and important announcements in
                        real-time.</p>
                </div>
                <div>
                    <div>img</div>
                    <h1>Timetable Management</h1>
                    <p>Easily create, update, and access class schedules and examination timetables through our
                        intuitive interface.</p>
                </div>
                <div>
                    <div>img</div>
                    <h1>Attendance Tracking</h1>
                    <p>Effortlessly monitor attendance for all classes and events, ensuring accurate and up-to-date
                        records.</p>
                </div>
            </div>
        </div>

        <div>
            <div>
                <h1>Testimonials</h1>
            </div>
            <div>
                <div><img src="" alt=""></div>
                <div>
                    <h3></h3>
                    <h1></h1>
                    <p></p>
                </div>
            </div>
        </div>
        <footer class="p-4 bg-gray-100 rounded-lg">
            <p class="text-sm text-gray-600 mb-2">For any inquiries, feel free to reach out:</p>
            <ul class="space-y-2">
                <li class="flex items-center text-sm text-gray-600">
                    <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                    <a href="mailto:sukhpalsingh0333@gmail.com"
                        class="text-green-500 hover:text-green-600">sukhpalsingh0333@gmail.com</a>
                </li>
                <li class="flex items-center text-sm text-gray-600">
                    <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h2a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2v-6a2 2 0 012-2zM7 10h10v12H7V10zM14 4a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <a href="tel:+9991623677" class="text-green-500 hover:text-green-600">999-162-3677</a>
                </li>
                <li class="flex items-center text-sm text-gray-600">
                    <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v16h16V4H4zm16-2H4a2 2 0 00-2 2v16a2 2 0 002 2h16a2 2 0 002-2V4a2 2 0 00-2-2z" />
                    </svg>
                    <a href="https://www.instagram.com/happy__sran/" class="text-green-500 hover:text-green-600"
                        target="_blank">happy__sran</a>
                </li>
                <li class="text-sm text-gray-600">Location: Kalanwali, Desu Malkana, Haryana</li>
                <li class="text-sm text-gray-600">Best Regards, Sukhpal Singh</li>
            </ul>
        </footer>
    </main>


</body>

</html><?php /**PATH D:\laravel project\attendance-Management\resources\views/welcome.blade.php ENDPATH**/ ?>