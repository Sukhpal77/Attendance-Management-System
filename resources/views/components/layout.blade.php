<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full h-screen p-1 font-serif">
    <div class="w-full h-full flex flex-row ">

    <nav class=" w-1/6 h-full shadow-2xl rounded-lg content-between flex flex-col items-center shadow-green-700 "> 
        <div class=" w-20 my-4 cursor-pointer font-bold text-xl text-green-600 ">
            <img src="logo.png" alt="">
        </div>
        <div class="flex flex-col my-16 w-full items-center">
        <div class=" cursor-pointer  font-bold text-xl text-green-600 w-full h-16 rounded-lg text-center items-center justify-evenly flex ">Attendance</div>
        <div class=" cursor-pointer font-bold text-xl text-white bg-green-600 w-full h-16 rounded-lg text-center items-center justify-evenly flex ">TimeTable</div>
        </div>
        <div class=" mt-72 cursor-pointer font-bold text-xl text-green-600 items-center justify-center ">Logout
            <div class="w-14 p-2 flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="green" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
             </div>
        </div>
    </nav>

    <div class=" w-4/5 h-full flex flex-col">
        <div class="header w-full h-1/6 ">
            <div class=" w-full h-3/5 flex flex-row justify-between p-5 ">
                <div class="font-bold text-xl  text-green-600 "><spam class="font-extrabold">TimeTable - </spam>{{ $data[0]->course_name ?? 'N/A' }}</div>
                <div class="flex flex-row items-center ">
                    <div class="flex flex-col items-end content-center ">
                        <div class="text-green-600 font-bold ">Sukhpal Singh</div>
                        <div class="text-green-600  font-bold">Student</div>
                    </div>
                    <div class=" w-16 ">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" className="size-6 ">
                             <path fillRule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clipRule="evenodd" />
                         </svg>
                    </div>
                </div>
            </div>
        </div>
        {{ $slot }}
        </div>
    </div>
    </div>
</body>
</html>