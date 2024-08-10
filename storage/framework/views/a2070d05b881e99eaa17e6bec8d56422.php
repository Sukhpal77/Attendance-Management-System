

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl text-green-600">
    <span class="font-extrabold">TimeTable - </span><?php echo e($name ?? 'N/A'); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full h-full flex justify-center items-center pb-4">
    <form id="timetableForm"
        class="w-5/6 h-full justify-center items-center flex rounded-lg shadow-lg shadow-green-600 bg-blend-lighten"
        action="<?php echo e(route('addTimeTable')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="w-5/6 h-5/6  flex flex-col justify-center items-center border-b border-gray-900/10 pb-12">
            <h1 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-green-600 md:text-3xl lg:text-3xl">
                Add New TimeTable</h1>

            <div class="mt-10 grid grid-cols-3 gap-x-6 gap-y-8 sm:grid-cols-6 w-full">


                <div class="sm:col-span-2">
                    <label for="selectedValue1" class="block text-sm font-medium text-gray-700 mb-2">Course Name</label>
                    <button id="dropdownHoverButton1"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Select Course
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="selectedValue1" name="courseId">
                    <div id="dropdownHover1"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow comman-w h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton1">
                            <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                        data-value="<?php echo e($Course->id); ?>"><?php echo e($Course->course_name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="selectedValue2" class="block text-sm font-medium text-gray-700 mb-2">Batch</label>
                    <button id="dropdownHoverButton2"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Select Batch
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="selectedValue2" name="batchId">
                    <div id="dropdownHover2"
                        class="dropdown-menu comman-w absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow comman-w  h-32 overflow-y-scroll overflow-x-hidden no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton2">

                        </ul>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="selectedValue3" class="block text-sm font-medium text-gray-700 mb-2">Subject
                        Name</label>
                    <button id="dropdownHoverButton3"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Select Subject
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="selectedValue3" name="subjectId">
                    <div id="dropdownHover3"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow comman-w h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton3">

                        </ul>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="selectedValue4" class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                    <button id="dropdownHoverButton4"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Select Start Time
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="selectedValue4" name="startTime">
                    <div id="dropdownHover4"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow comman-w h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton4">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="10:00AM">10:00AM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="10:40AM">10:40AM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="11:20AM">11:20AM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="12:00PM">12:00PM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="12:40PM">12:40PM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="01:20PM">01:20PM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="02:00PM">02:00PM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="02:40PM">02:40PM</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="03:20PM">03:20PM</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="selectedValue6" class="block text-sm font-medium text-gray-700 mb-2">Teacher
                        Name</label>
                    <button id="dropdownHoverButton6"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Select Teacher
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="selectedValue6" name="teacherId">
                    <div id="dropdownHover6"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow comman-w h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton6">

                        </ul>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="selectedValue4" class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                    <input type="text" id="endtime" name="endTime"
                        class="block w-full rounded-md border-0 text-black shadow-sm ring-1 ring-inset ring-green-600 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
                        readonly>
                </div>

                <div class="sm:col-span-2">
                    <label for="Group" class="block text-sm font-medium text-gray-700 mb-2">Group</label>
                    <div class="flex flex-row ms-4">
                        <div class="flex items-center justify-center  ps-3">
                            <input id="groupA" type="radio" value="A" name="Group"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-green-600 focus:ring-green-600">
                            <label for="groupA" class="w-full py-3 ms-2 text-sm font-medium text-black">Group A</label>
                        </div>
                        <div class="flex items-center justify-center  ps-3">
                            <input id="groupB" type="radio" value="B" name="Group"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-green-600 focus:ring-green-600">
                            <label for="groupB" class="w-full py-3 ms-2 text-sm font-medium text-black">Group B</label>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="day" class="block text-sm font-medium text-gray-700 mb-2">Day</label>
                    <input id="day" name="day" value="<?php echo e($day); ?>" readonly
                        class="block w-full rounded-md border-0 text-black shadow-sm ring-1 ring-inset ring-green-600 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>

                <div class="sm:col-span-2">
                    <label for="selectedValue5" class="block text-sm font-medium text-gray-700 mb-2">Semester</label>
                    <button id="dropdownHoverButton5"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Select Semester
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="selectedValue5" name="semester">
                    <div id="dropdownHover5"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow comman-w h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton5">
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="1">1</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="2">2</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="3">3</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="4">4</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="5">5</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="6">6</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="7">7</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="8">8</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="9">9</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="10">10</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="11">11</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="12">12</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="flex justify-end gap-6 w-full mt-6">
                <div class=" px-4 py-3 text-right sm:px-6">
                    <a href="#" onclick="goBack()"
                        class="rounded-md text-green-500 px-4  py-2 text-sm font-semibold hover:text-white hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Back</a>
                
                <button type="submit" id="saveButton"
                class="rounded-md bg-green-600 px-4 py-2 ml-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>

    function setupDropdown(dropdownButtonId, dropdownMenuId, hiddenInputId, callback) {
    const dropdownButton = document.getElementById(dropdownButtonId);
    const dropdownMenu = document.getElementById(dropdownMenuId);
    const hiddenInput = document.getElementById(hiddenInputId);

    if (!dropdownButton || !dropdownMenu || !hiddenInput) {
        console.error(`One or more elements not found: ${dropdownButtonId}, ${dropdownMenuId}, ${hiddenInputId}`);
        return;
    }

    dropdownButton.addEventListener('mouseover', () => {
        dropdownMenu.classList.add('show');
    });

    dropdownButton.addEventListener('mouseout', () => {
        dropdownMenu.classList.remove('show');
    });

    dropdownMenu.addEventListener('mouseover', () => {
        dropdownMenu.classList.add('show');
    });

    dropdownMenu.addEventListener('mouseout', () => {
        dropdownMenu.classList.remove('show');
    });

    document.querySelectorAll(`#${dropdownMenuId} .dropdown-item`).forEach(function (item) {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            const selectedItemText = this.textContent;
            const selectedValue = this.getAttribute('data-value');
            dropdownButton.textContent = selectedItemText;
            hiddenInput.value = selectedValue;
            if (callback) callback(selectedValue);
            dropdownMenu.classList.remove('show');
        });
    });
}

    function calculateEndTime(startTime) {
        const timeMap = {
            "10:00AM": "10:40AM",
            "10:40AM": "11:20AM",
            "11:20AM": "12:00PM",
            "12:00PM": "12:40PM",
            "12:40PM": "01:20PM",
            "01:20PM": "02:00PM",
            "02:00PM": "02:40PM",
            "02:40PM": "03:20PM",
            "03:20PM": "04:00PM",
        };
        return timeMap[startTime] || "04:00PM";
    }

    function fecthbatches(courseId) {
    fetch('<?php echo e(route("getBatch")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        },
        body: JSON.stringify({ courseId: courseId }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        const batches = data.batchs;
        const dropdownMenu = document.getElementById('dropdownHover2')?.querySelector('ul');
        if (!dropdownMenu) return;

        dropdownMenu.innerHTML = '';

        if (Array.isArray(batches) && batches.length > 0) {
            batches.forEach(batch => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="#" class="block px-4 py-2 w-full hover:bg-green-600 dropdown-item hover:text-white" data-value="${batch.id}">${batch.name}</a>`;
                dropdownMenu.appendChild(li);
            });
        }

        setupDropdown('dropdownHoverButton2', 'dropdownHover2', 'selectedValue2', fetchsubjects);
    })
    .catch(error => {
        console.error('Error fetching batches:', error);
        toastr.error('An error occurred while fetching batches');
    });
}

function fetchsubjects(courseId) {
    fetch('<?php echo e(route("getsubjects")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        },
        body: JSON.stringify({ courseId: courseId }),
    })
    .then(response => response.json())
    .then(data => {
        const dropdownMenu = document.getElementById('dropdownHover3').querySelector('ul');
        dropdownMenu.innerHTML = '';
        const subjects = data.subjects; 
        if (Array.isArray(subjects) && subjects.length > 0) {
            subjects.forEach(subject => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white" data-value="${subject.id}">${subject.name}</a>`;
                dropdownMenu.appendChild(li);
            });
        }
        setupDropdown('dropdownHoverButton3', 'dropdownHover3', 'selectedValue3', fetchTeachers);
    })
    .catch(error => console.error('Error fetching subjects:', error));  
}



function fetchTeachers(subjectId) {
    fetch('<?php echo e(route("getTeachers")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        },
        body: JSON.stringify({ subjectId: subjectId }),
    })
    .then(response => response.json())
    .then(data => {
        const dropdownMenu = document.getElementById('dropdownHover6').querySelector('ul');
        dropdownMenu.innerHTML = '';
        const teachers = data.teachers;  
        if (Array.isArray(teachers) && teachers.length > 0) {
            teachers.forEach(teacher => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white" data-value="${teacher.id}">${teacher.first_name} ${teacher.last_name}</a>`;
                dropdownMenu.appendChild(li);
            });
        }
        setupDropdown('dropdownHoverButton6', 'dropdownHover6', 'selectedValue6');
    })
    .catch(error => console.error('Error fetching teachers:', error));
}


    setupDropdown('dropdownHoverButton1', 'dropdownHover1', 'selectedValue1', fecthbatches);
    setupDropdown('dropdownHoverButton4', 'dropdownHover4', 'selectedValue4', (startTime) => {
        const endTime = calculateEndTime(startTime);
        document.getElementById('selectedValue4').value = startTime;
        document.getElementById('dropdownHoverButton4').textContent = startTime;
        document.getElementById('endtime').value = endTime;
        document.getElementById('endtime').textContent = endTime;

    });
    setupDropdown('dropdownHoverButton6', 'dropdownHover6', 'selectedValue6');
    setupDropdown('dropdownHoverButton5', 'dropdownHover5', 'selectedValue5');


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


    $('#saveButton').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: $('#timetableForm').attr('action'),
            type: 'POST',
            data: $('#timetableForm').serialize(),
            success: function (response) {
                toastr.success('Timetable updated successfully');
            },
            error: function (xhr, status, error) {
                toastr.error('An error occurred: ' + xhr.responseText);
            }
        });
    });

    function goBack() {
        window.history.back();
    }
</script>



<?php $__env->startPush('toast'); ?>
    <style>
        .toast-container {
            top: 20px !important;
        }

        .toast {
            border-radius: 30px !important;
            margin-top: 20px !important;
        }


        .toast-success {
            background-color: #38a169;
        }

        .toast-error {
            background-color: #e53e3e;
        }
        .comman-w{
            width: 18%;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/admin/addTimeTable.blade.php ENDPATH**/ ?>