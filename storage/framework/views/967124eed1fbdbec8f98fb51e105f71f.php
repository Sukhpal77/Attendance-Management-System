

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl text-green-600">
    <span class="font-extrabold">TimeTable - </span><?php echo e($data[0]->course_name ?? 'N/A'); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="flex flex-col items-center w-full h-5/6 overflow-y-auto">
    <div class="right-40 flex flex-row justify-around w-5/6 sticky top-1">
        <?php
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        ?>

        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                class="day-button <?php echo e($day); ?> text-green-700 hover:text-white border border-green-700 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg h-10 me-2 mb-2"
                data-day="<?php echo e(strtolower($day)); ?>">
                <a href="<?php echo e(route('sTimeTable', ['day' => $day])); ?>"
                    class="<?php echo e($day); ?> w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                    <?php echo e($day); ?>

                </a>
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="w-full overflow-y-auto pl-20 content-center no-scrollbar">
        <?php if(!empty($data)): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $TimeTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="my-9 shadow-lg bg-white w-5/6 h-28 rounded-lg flex flex-row content-center justify-around items-center shadow-green-700">
                    <div class="flex flex-col">
                        <div class="text-lg"><?php echo e(convertTimeTo12HourFormat($TimeTable->start_time)); ?></div>
                        <div class="text-base"><?php echo e(convertTimeTo12HourFormat($TimeTable->end_time)); ?></div>
                    </div>
                    <div class="flex flex-row p-5">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" class="size-6">
                                <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                            </svg>
                        </div>
                        <div class="text-lg px-1"><?php echo e($TimeTable->day); ?></div>
                    </div>
                    <div class="flex flex-col">
                        <div><?php echo e($TimeTable->subject_name); ?></div>
                        <div><?php echo e($TimeTable->course_name); ?></div>
                    </div>
                    <div><?php echo e($TimeTable->teacher_name); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="text-center text-green-700 font-medium text-lg">No timetable data available.</div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        .<?php echo e(strtolower($day)); ?> {
            background-color: #43A047;
            color: white;
        }
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('students.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/students/timetable.blade.php ENDPATH**/ ?>