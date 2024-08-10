

<?php $__env->startSection('heading'); ?>
<div class="text-xl text-green-600 font-extrabold flex flex-row items-center h-1/6">Update Attendance</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full h-5/6">
    <form method="GET" action="<?php echo e(route('admin.updateAttendance')); ?>" class="w-full h-2/6">
        <div class="relative w-full max-w-xl mx-auto bg-white rounded-full mb-4">
            <input placeholder="Search by name"
                class="rounded-full w-full h-16 bg-transparent py-2 pl-8 pr-32 outline-none border-2 border-gray-100 shadow-md hover:outline-none focus:ring-green-200 focus:border-green-200"
                type="text" name="query" id="query" value="<?php echo e(request()->get('query')); ?>">
            <button type="submit"
                class="absolute inline-flex items-center h-10 px-4 py-2 text-sm text-white transition duration-150 ease-in-out rounded-full outline-none right-3 top-3 bg-green-600 sm:px-6 sm:text-base sm:font-medium hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-0.5 sm:-ml-1 mr-2 w-4 h-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Search
            </button>
        </div>

        <div class="relative w-full max-w-xl mx-auto pl-24 bg-white rounded-full justify-center">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select date</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker id="default-datepicker" type="text" name="date"
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                    placeholder="Select date" value="<?php echo e(request()->get('date', date('Y-m-d'))); ?>">
            </div>
        </div>
    </form>

    <div class="flex flex-col w-full justify-center items-center mt-4">
        <?php if($data->count()): ?>
            <div class="w-5/6 flex justify-center content-center align-middle rounded-xl overflow-hidden shadow-xl">
                <div class="relative w-full text-gray-500 focus-within:text-gray-900 mb-4 rounded-xl">
                    <div class="w-full overflow-hidden rounded-t-xl">
                        <table class="w-full lg:w-full">
                            <thead class="rounded-t-xl">
                                <tr class="bg-green-600 text-white">
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold capitalize">Name
                                    </th>
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold capitalize">User ID
                                    </th>
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold capitalize">Course
                                    </th>
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold capitalize">Subject
                                    </th>
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold capitalize">Date
                                    </th>
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold capitalize">Status
                                    </th>
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold capitalize">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timetable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $timetable->attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                <?php echo e($attendance->student->first_name); ?> <?php echo e($attendance->student->last_name); ?>

                                            </td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                <?php echo e($attendance->student->id); ?>

                                            </td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                <?php echo e($timetable->course_id); ?>

                                            </td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                <?php echo e($timetable->subject_id); ?>

                                            </td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                <?php echo e($attendance->date); ?>

                                            </td>
                                            <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                <?php echo e($attendance->present == 'Yes' ? 'Present' : 'Absent'); ?>

                                            </td>
                                            <td class="p-5">
                                                <div class="flex items-center gap-1">
                                                    <button
                                                        class="p-2 rounded-full group transition-all duration-500 flex items-center">
                                                        <a href="<?php echo e($attendance->student->role == "student" ? route('StudentForm') : route('TeacherForm')); ?>"
                                                            class="w-full">
                                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                fill="currentColor" viewBox="0 0 24 24">
                                                                <svg class="w-6 h-6 text-gray-500 dark:text-gray-300"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </svg>
                                                        </a>
                                                    </button>
                                                    <form id="postForm" action="<?php echo e(route('Profile')); ?>" method="POST"
                                                        style="display: none;">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($attendance->student->id); ?>">
                                                        <input type="hidden" name="role" value="<?php echo e($attendance->student->role); ?>">
                                                    </form>

                                                    <button onclick="document.getElementById('postForm').submit(); return false;"
                                                        class="p-2 rounded-full group transition-all duration-500 flex items-center">
                                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                                d="M12 6h.01M12 12h.01M12 18h.01" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="flex justify-center">
                <img src="<?php echo e(asset('img/find.jpg')); ?>" alt="Find" class="w-1/2 h-auto">
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .UpdateAttendance {
            background-color: #057A55;
            color: white;
        }

        .TimeTable {
            background-color: white;
            color: #057A55;
        }

        .UpdateAttendance:hover {
            background-color: #057A55;
        }

        .TimeTable:hover {
            background-color: rgb(243 244 246);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script
        src="https://cdn.jsdelivr.net/npm/@themesberg/tailwind-datepicker@1.0.3/dist/tailwind-datepicker.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const datepickerEl = document.getElementById('default-datepicker');
            const datepicker = new Datepicker(datepickerEl, {
                // Your custom datepicker options here
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/admin/updateAttendance.blade.php ENDPATH**/ ?>