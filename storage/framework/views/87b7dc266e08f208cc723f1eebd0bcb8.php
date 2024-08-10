

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl text-green-600">
    <span class="font-extrabold">TimeTable - </span><?php echo e($batchName ?? 'No Classes'); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="flex flex-col items-center w-full  ">
    <div class="w-full flex flex-row justify-evenly px-7 sticky top-1 mr-32">
        <?php
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        ?>

        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                class="day-button <?php echo e(strtolower($dayName)); ?> text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg h-10 me-2 mb-2 <?php echo e($dayName == $selectedDay ? 'active' : ''); ?>"
                data-day="<?php echo e(strtolower($dayName)); ?>">
                <a href="<?php echo e(route('sudentTimeTable', ['day' => $dayName])); ?>"
                    class="w-full h-full text-sm px-5 py-2.5 text-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg">
                    <?php echo e($dayName); ?>

                </a>
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="w-full  pl-20 content-center overflow-y-scroll overflow-x-hidden no-scrollbar ">
        <?php if($data->isEmpty()): ?>
            <div class="w-full h-full flex items-center justify-center">
                <img src="<?php echo e(asset('img/empty.jpg')); ?>" alt="Empty" class="w-4/6 h-5/6">
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $TimeTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="my-9 shadow-xl bg-white w-5/6 h-28 rounded-lg flex flex-row content-center justify-around items-center ">
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
                        <div><?php echo e($TimeTable->batch_name); ?></div>
                    </div>
                    <div><?php echo e($TimeTable->teacher_name); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .<?php echo e(strtolower($selectedDay)); ?> {
        background-color: #388E3C;
        color: white;
    }
    .<?php echo e(strtolower($selectedDay)); ?> a{
        
        color: white;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('student.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/student/timeTable.blade.php ENDPATH**/ ?>