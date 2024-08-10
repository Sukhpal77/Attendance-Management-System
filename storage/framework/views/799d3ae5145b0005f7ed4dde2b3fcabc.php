

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl text-green-600">TimeTable</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="flex flex-col items-center w-full h-5/6 overflow-y-auto">
    <div class="right-40 flex flex-row justify-around w-5/6 sticky top-1">
        <?php
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        ?>

        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                class="day-button <?php echo e(strtolower($dayName)); ?> text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg h-10 me-2 mb-2 <?php echo e($dayName == $selectedDay ? 'active' : ''); ?>"
                data-day="<?php echo e(strtolower($dayName)); ?>">
                <a href="<?php echo e(route('teacherTimeTable', ['day' => $dayName])); ?>"
                    class="w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                    <?php echo e($dayName); ?>

                </a>
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="w-full overflow-y-auto pl-20 content-center no-scrollbar">
        <?php if($data->isEmpty()): ?>
            <div class="w-full h-full flex items-center justify-center">
                <img src="<?php echo e(asset('img/empty.jpg')); ?>" alt="Empty" class="w-4/6 h-5/6">
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $TimeTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class='relative w-5/6 h-36 rounded-xl  overflow-hidden flex flex-col bg-transparent   timetable-item'>
                    <div
                        class=" shadow-xl bg-white w-full h-28 rounded-lg mt-10 px-10 py-2 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-5 ">
                        <div class="sm:col-span-1 hello">
                            <div class="text-lg start-time"><?php echo e(convertTimeTo12HourFormat($TimeTable->start_time)); ?></div>
                            <div class="text-base end-time"><?php echo e(convertTimeTo12HourFormat($TimeTable->end_time)); ?></div>
                        </div>
                        <div class="sm:col-span-1">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" class="size-6">
                                    <path
                                        d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>
                            </div>
                            <div class="text-lg px-1"><?php echo e($TimeTable->day); ?></div>
                        </div>
                        <div class="sm:col-span-1">
                            <div><?php echo e($TimeTable->subject_name); ?></div>
                            <div><?php echo e($TimeTable->course_name); ?></div>
                        </div class="sm:col-span-1">
                        <div><?php echo e($TimeTable->teacher_name); ?></div>
                        <div class="sm:col-span-1">
                        <button
                            class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm py-2.5 text-center me-2 mb-2">
                            <a href="<?php echo e(route('takeAttendance', ['id' => $TimeTable->id])); ?>"
                                class="w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                                Take Attendance
                            </a>
                        </button>
                    </div>
                    </div>
                    <div class="relative progressBar w-full  h-5 bg-gray-200 mb-4 rounded-xl">
                        <div class="absolute top-0 z-10  h-2 bg-green-500  rounded progress-bar" style="width:0%;">
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>

<?php echo $__env->yieldPushContent('script'); ?>
<script>
    toastr.options = {
        "positionClass": "toast-top-center",
    };
    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    function updateProgressBar() {
        const now = new Date();

        document.querySelectorAll('.hello').forEach(el => {
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

            const progress = totalDuration > 0 ? Math.max(0, Math.min(100, (elapsedTime / totalDuration) * 50)) : 0;

            const testProgressBar = document.querySelector('.progress-bar');
            testProgressBar.style.width = progress + '%';

        });
    }
    document.addEventListener('DOMContentLoaded', function () {
        updateProgressBar();
        setInterval(updateProgressBar, 60000);
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .<?php echo e(strtolower($selectedDay)); ?> {
            background-color: #057A55;
            color: white;
        }

        .<?php echo e(strtolower($selectedDay)); ?> a {
            color: white;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('teacher.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/teacher/timeTable.blade.php ENDPATH**/ ?>