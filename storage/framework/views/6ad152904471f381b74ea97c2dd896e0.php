

<?php $__env->startSection('heading'); ?>
<div class="text-xl text-green-600 font-extrabold flex flex-row items-center h-1/6">
    Class - 
    <ul class="relative">
    <?php if($userrole == 'teacher'): ?>
        <li class="inline-block">
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                class="flex items-center justify-between w-full text-green-600 rounded focus:outline-none">
                <span id="dropdownNavbarText"><?php echo e($selectedBatch ? $selectedBatch->batch_name : 'Select Class'); ?></span>
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <div id="dropdownNavbar"
                class="w-36 max-h-40 dropdown-menu z-10 hidden font-normal absolute bg-white divide-y divide-gray-100 rounded-lg shadow overflow-scroll no-scrollbar">
                <ul class="py-2 text-sm text-green-600" aria-labelledby="dropdownNavbarLink">
                <?php $__empty_1 = true; $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li>
                        <a href="<?php echo e(route('adminTimeTable', ['id' => $batch->id])); ?>"
                           class=" ml-2 courseName block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">
                            <?php echo e($batch->batch_name); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li>
                        <a href="#"
                           class="ml-2 courseName block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">
                            No Class
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </li>
        <?php else: ?>
        <li><span id="dropdownNavbarText " class="ml-2"> <?php echo e($selectedBatch ? $selectedBatch->batch_name : 'Select Class'); ?></span></li>
        <?php endif; ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-5/6 h-4/5  mx-auto ">
    <div class="font-bold text-xl text-green-600 text-center mb-3 ">
        <span class="font-extrabold">Exam DateSheet</span>
    </div>
    <?php if($userrole=="teacher"): ?>
    <div class="text-right mb-4 forteacher ">
        <a href=<?php echo e(route('CreateDateSheet', ['batchId' => $selectedBatch->id ?? 1])); ?> class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Create DateSheet</a>
    </div>
    <?php endif; ?>
    <table class="w-full text-md text-left rtl:text-right text-gray-500 rounded-lg shadow-xl h-4/5">
        <thead class="text-xs text-gray-500 uppercase bg-green-100 rounded-lg">
            <tr>
                <th scope="col" class="px-6 py-3">Date & Day</th>
                <th scope="col" class="px-6 py-3">Time</th>
                <th scope="col" class="px-6 py-3">Subject</th>
                <th scope="col" class="px-6 py-3">Class</th>
                <th scope="col" class="px-6 py-3">Group</th>
            </tr>
        </thead>
        <tbody class="overflow-y-scroll overflow-x-hidden no-scorller no-scrollbar">
            <?php $__empty_1 = true; $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-2">
                        <?php echo e(\Carbon\Carbon::parse($exam->exam_date)->format('Y-m-d')); ?><br>
                        <?php echo e(\Carbon\Carbon::parse($exam->exam_date)->format('l')); ?>

                    </td>
                    <td class="px-6 py-2"><?php echo e($exam->exam_time); ?></td>
                    <td class="px-6 py-2"><?php echo e($exam->subject_name); ?></td>
                    <td class="px-6 py-2"><?php echo e($exam->batch_name); ?></td>
                    <td class="px-6 py-2"><?php echo e($exam->group_name); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center py-6">
                        <img src="<?php echo e(asset('img/empty.jpg')); ?>" alt="No Data" class="w-1/3 h-auto mx-auto">
                        <p class="mt-2 text-gray-500">No exam dates available.</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .dropdown-menu.show {
        display: block;
    }
    .DateSheet {
        background-color: #057A55;
        color: white;
        }
        .TimeTable {
            background-color: white;
            color: #057A55;
        }
        .DateSheet:hover{
            background-color: #057A55;
        }
        .TimeTable:hover{
            background-color: rgb(243 244 246);
        } 
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownLink = document.getElementById('dropdownNavbarLink');
        const dropdownMenu = document.getElementById('dropdownNavbar');

        dropdownLink.addEventListener('click', () => {
            dropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', (event) => {
            if (!dropdownLink.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });

    toastr.options = {
        "positionClass": "toast-top-center",
    };
    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>
</script>
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($userrole . '.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/exam/dateSheet.blade.php ENDPATH**/ ?>