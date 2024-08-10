

<?php $__env->startSection('heading'); ?>
<div class="text-xl text-green-600 font-extrabold flex flex-row items-center">
    TimeTable -
    <!-- Component -->
    <div class="group inline-block relative">
        <button id="selectedCourseButton"
            class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
            <span class="pr-1 font-semibold flex-1">Select Batch</span>
            <span>
                <svg class="fill-current h-4 w-4 transform transition-transform duration-150 ease-in-out group-hover:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </span>
        </button>
        <ul id="courseDropdown"
            class="multi-ul z-20 transform scale-0 multidropdown group-hover:scale-100 absolute transition-transform duration-150 ease-in-out origin-top min-w-32 max-h-60 overflow-x-hidden overflow-y-scroll no-scrollbar">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="group relative text-sm">
                    <button class="outline-none focus:outline-none rounded-md px-3 py-2 bg-white flex items-center w-72"
                        data-course-id="<?php echo e($course->id); ?>">
                        <span class="pr-1 font-semibold flex-1"><?php echo e($course->course_name); ?></span>
                        <span>
                            <svg class="fill-current h-4 w-4 transform transition duration-150 ease-in-out"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </button>
                    <ul class="absolute top-0 right-0 z-10 w-72 gap-3 font-normal hidden group-hover:block max-h-60 "
                        id="batchDropdown-<?php echo e($course->id); ?>">
                        <!-- Batch items will be dynamically added here -->
                        <li class="px-3 py-1 rounded-md bg-white w-36 cursor-wait">Loading...</li>
                    </ul>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="flex flex-col items-center w-full h-5/6 overflow-y-scroll overflow-x-hidden no-scrollbar">
    <div class="w-full flex flex-row justify-evenly px-7 sticky top-1 mr-32">
        <div class="daysmenu">
            <?php
                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                $selectedDay = $selectedDay ?? 'monday'; 
            ?>

            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    class="day-button <?php echo e(strtolower($dayName)); ?> text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg h-10 me-2 mb-2"
                    data-day="<?php echo e(strtolower($dayName)); ?>">
                    <a href="javascript:void(0);" data-day="<?php echo e(strtolower($dayName)); ?>"
                        class="day-link w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                        <?php echo e($dayName); ?>

                    </a>
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button
            class="addButton text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm py-2.5 text-center me-2 mb-2">
            <a href="<?php echo e(route('addTable', ['day' => $selectedDay])); ?>"
                class="w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                Add
            </a>
        </button>
    </div>
    <div class="w-full overflow-y-auto pl-20 content-center no-scrollbar">
        <div id="timetableContainer">
            <?php if($Timetable->isEmpty()): ?>
                <div class="w-full h-full flex items-center justify-center">
                    <img src="<?php echo e(asset('img/empty.jpg')); ?>" alt="Empty" class="w-4/6 h-5/6">
                </div>
            <?php else: ?>
                <?php $__currentLoopData = $Timetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $TimeTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="my-9 hello shadow-xl bg-white w-5/6 h-28 rounded-lg flex flex-row content-center justify-around items-center">
                        <div class="flex flex-col">
                            <div class="text-lg start-time"><?php echo e(convertTimeTo12HourFormat($TimeTable->start_time)); ?></div>
                            <div class="text-base end-time"><?php echo e(convertTimeTo12HourFormat($TimeTable->end_time)); ?></div>
                        </div>
                        <div class="flex flex-row p-5">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" class="size-6">
                                    <path
                                        d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>
                            </div>
                            <div class="text-lg px-1"><?php echo e($TimeTable->day); ?></div>
                        </div>
                        <div class="flex flex-col">
                            <div><?php echo e($TimeTable->subject_name); ?></div>
                            <div><?php echo e($TimeTable->batch_name); ?></div>
                        </div>
                        <div>Sem -<?php echo e($TimeTable->semester); ?></div>
                        <div><?php echo e($TimeTable->teacher_name); ?></div>
                        <div>
                            <button
                                class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm py-2.5 text-center me-2 mb-2">
                                <a href="<?php echo e(route('updateTable', ['id' => $TimeTable->id])); ?>"
                                    class="w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                                    Edit
                                </a>
                            </button>
                            <form action="<?php echo e(route('deleteTable', ['id' => $TimeTable->id])); ?>" method="POST"
                                style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button
                                    class="text-green-700  hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center me-2 mb-2">
                                    Delete
                                </button>
                            </form>
                        </div>
                        <div class="relative w-full h-9 bg-gray-200 mt-2 rounded">
                            <div class="absolute top-0 left-0 h-full bg-green-500 rounded progress-bar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .day-button {
            background-color: white;
            color: #057A55;
        }

        .day-button.active {
            background-color: #057A55;
            color: white;

        }

        .day-button.active a {
            color: white;
        }

        .day-button a:hover {
            color: white;
        }

        .multi-ul {
            transform: scale(0);
            transition: transform 0.5s ease;
        }

        .multi-ul {
            transform: scale(0);
            transition: transform 0.3s ease;
            transform-origin: top right;
            position: absolute;
            z-index: 10;
        }

        .group:hover .multi-ul {
            transform: scale(1);
        }

        .scale-100 {
            transform: scale(1);
        }

        li>ul {
            transform: translateX(100%) translateY(-0.5%);
            transition: transform 0.3s;
        }

        .group:hover>ul {
            transform: translateX(0%) translateY(0%);
        }

        .multidropdown {
            width: 572px;
        }

        .progress-bar {
            height: 100%;
            transition: width 0.5s ease;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let selectedBatchId = null;
            let selectedDay = '<?php echo e(strtolower($selectedDay)); ?>'; 

            document.querySelector(`.day-button[data-day="${selectedDay}"]`).classList.add('active');

            document.querySelectorAll('.group button').forEach(button => {
                button.addEventListener('mouseover', function () {
                    selectedBatchId = this.dataset.courseId;
                    const batchDropdown = document.querySelector(`#batchDropdown-${selectedBatchId}`);
                    if (batchDropdown.children.length > 1) {
                        return;
                    }

                    fetch(`/admin/batches/${selectedBatchId}`)
                        .then(response => response.json())
                        .then(data => {
                            batchDropdown.innerHTML = ''; 

                            data.batches.forEach(batch => {
                                const li = document.createElement('li');
                                li.className = 'px-3 py-1 rounded-md cursor-pointer z-10 bg-white w-36 hover:bg-gray-100';
                                li.textContent = batch.batch_name;
                                li.dataset.batchId = batch.id;
                                batchDropdown.appendChild(li);

                            });
                        })
                        .catch(error => {
                            console.error('Error fetching batch data:', error);
                        });
                });
            });

            document.addEventListener('click', function (event) {
                if (event.target.matches('.day-link')) {
                    selectedDay = event.target.dataset.day;

                    document.querySelectorAll('.day-button').forEach(button => {
                        button.classList.toggle('active', button.dataset.day === selectedDay);
                    });

                    if (selectedBatchId !== null) {

                        document.querySelectorAll('.multi-ul').forEach(dropdown => {
                            dropdown.classList.remove('scale-100');
                        });
                        fetchTimetableData(selectedBatchId, selectedDay);
                    } else {
                        alert('Please select a batch first.');
                    }
                }

                if (event.target.matches('li')) {
                    const batchId = event.target.dataset.batchId;
                    selectedBatchId = batchId;
                    const button = document.querySelector('#selectedCourseButton');
                    button.querySelector('span').textContent = event.target.textContent;

                    document.querySelectorAll('.multi-ul').forEach(dropdown => {
                        dropdown.classList.remove('scale-100');
                    });

                    fetchTimetableData(selectedBatchId, selectedDay);
                }
            });

            function fetchTimetableData(batchId, day) {
                fetch(`/admin/timetable`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ batch_id: batchId, day: day })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            updateTable(data.timetable);
                        } else {
                            console.error('Error:', data.message);
                            alert(data.message); 
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching timetable data:', error);
                    });
            }

            function updateTable(timetable) {
                const tableContainer = document.querySelector('#timetableContainer');
                tableContainer.innerHTML = '';

                if (timetable.length === 0) {
                    tableContainer.innerHTML = '<div class="w-full h-full flex items-center justify-center"><img src="/img/empty.jpg" alt="Empty" class="w-4/6 h-5/6"></div>';
                    return;
                }

                timetable.forEach(item => {
                    const timetableDiv = document.createElement('div');
                    timetableDiv.className = 'my-9 shadow-xl bg-white w-5/6 h-28 rounded-lg flex flex-row content-center justify-around items-center';
                    timetableDiv.innerHTML = `
               <div class='w-full h-28 round overflow-hidden flex flex-col timetable-item'>
                        <div class="w-full h-28 flex flex-row justify-evenly content-center items-center">
                            <div class="flex flex-col">
                              <div class="text-lg start-time">${convertTimeTo12HourFormat(item.start_time)}</div>
                              <div class="text-base end-time">${convertTimeTo12HourFormat(item.end_time)}</div>
                            </div>
                            <div class="flex flex-row p-5">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" class="size-6">
                                       <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                    </svg>
                                </div>
                                <div class="text-lg px-1">${item.day}</div>
                            </div>
                            <div class="flex flex-col">
                                 <div>${item.subject}</div>
                                 <div>${item.course}</div>
                            </div>
                            <div>Sem - ${item.semester}</div>
                            <div>${item.teacher}</div>
                            <div>
                                 <button class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm py-2 text-center me-2 mb-2">
                                     <a href="/updateTimeTable/${item.id}" class="w-full h-full text-sm px-5 py-2 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                                         Edit
                                    </a>
                                 </button>
                                 <form action="/deleteTimeTableData/${item.id}" method="POST" style="display: inline;">
                                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                     <input type="hidden" name="_method" value="DELETE">
                                     <button class="text-green-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center me-2 mb-2">
                                         Delete
                                     </button>
                                 </form>
                            </div>
                        </div>
                        <div class="relative progressBar w-full h-2 bg-gray-200 mt-2 rounded">
                            <div class="absolute top-0 left-0 h-full bg-green-500 rounded progress-bar" style="width: 0%;">
                            </div>
                        </div>
                    </div>
                `;
                tableContainer.appendChild(timetableDiv);
            });

            updateProgressBar();
        }

        function convertTimeTo12HourFormat(time) {
            const [hour, minute] = time.split(':').map(Number);
            const period = hour >= 12 ? 'PM' : 'AM';
            const newHour = hour % 12 || 12;
            return `${newHour}:${minute.toString().padStart(2, '0')} ${period}`;
        }

        function updateProgressBar() {
            const now = new Date();

            document.querySelectorAll('.timetable-item').forEach(el => {
                const startTimeText = el.querySelector('.start-time').textContent.trim();
                const endTimeText = el.querySelector('.end-time').textContent.trim();

                const [startHour, startMinute, startPeriod] = startTimeText.split(/[:\s]/);
                const [endHour, endMinute, endPeriod] = endTimeText.split(/[:\s]/);

                let startHour24 = parseInt(startHour);
                let endHour24 = parseInt(endHour);
                if (startPeriod === 'PM' && startHour24 < 12) startHour24 += 12;
                if (startPeriod === 'AM' && startHour24 === 12) startHour24 = 0;
                if (endPeriod === 'PM' && endHour24 < 12) endHour24 += 12;
                if (endPeriod === 'AM' && endHour24 === 12) endHour24 = 0;

                const startDate = new Date();
                startDate.setHours(startHour24, parseInt(startMinute), 0, 0);

                const endDate = new Date();
                endDate.setHours(endHour24, parseInt(endMinute), 0, 0);

                if (endDate < startDate) endDate.setDate(endDate.getDate() + 1);

                const totalDuration = endDate - startDate;
                const elapsedTime = now - startDate;

                const progress = totalDuration > 0 ? Math.max(0, Math.min(100, (elapsedTime / totalDuration) * 100)) : 0;

                el.querySelector('.progress-bar').style.width = progress + '%';
            });
        }
        setInterval(updateProgressBar, 60000);
    });
</script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/admin/editTimeTable.blade.php ENDPATH**/ ?>