

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl text-green-600">Event
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full h-5/6 flex justify-center content-center  ">
    <div class="flex flex-col w-full  max-w-5xl my-10 h-4/6 mx-auto bg-white shadow-lg rounded-lg ">
        <div class="px-4 py-5 sm:px-6 bg-green-600 rounded-t-lg ">
            <h3 class="text-xl leading-6 font-medium text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                    class="w-14 h-14 inline"><!--!Font Awesome Free 6.6.0 by @fontawesome - 
                https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ebebeb" d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 
                21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zM312 376c13.3 0 
                24-10.7 24-24s-10.7-24-24-24l-176 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l176 0z" />
                </svg>
                Add Event
            </h3>
        </div>
        <div class="flex flex-col border-t border-gray-200 ">
            <form action="<?php echo e(route('storeEvent')); ?>" method="POST" class="p-6" id="storeEvent">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-6 ">

                    <div class="sm:col-span-1">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            date</label>
                        <div class="relative max-w-sm">
                            <div class="absolute  inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker id="default-datepicker" type="text" name="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                placeholder="Select date">
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            time:</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="time" id="time" name="time"
                                class="bg-green-50 border border-green-500 text-green-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                min="09:00" max="18:00" value="00:00" required />
                        </div>

                    </div>

                    <div class="sm:col-span-1">
                        <label for="departmentName" class="block text-sm font-medium leading-6 text-green-600">Vanue
                        </label>
                        <div class="mt-2">
                            <input type="text" name="place" id="departmentName" autocomplete="place-name"
                                class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
                                required>
                            <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="notes"
                            class="block text-sm font-medium leading-6 text-green-600">Description</label>
                        <div class="mt-2">
                            <textarea id="notes" name="description" rows="4"
                                class="block  w-full rounded-md border-0 h-32 resize-none py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"></textarea>
                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="departmentName"
                            class="block text-sm font-medium leading-6 text-green-600">Title</label>
                        <div class="mt-2">
                            <input type="text" name="heading" id="departmentName" autocomplete="heading-name"
                                class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
                                required>
                            <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class=" px-4 py-3 text-right sm:px-6 mt-7 content-end">
                            <a href=<?php echo e(route('events.show')); ?>

                                class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 mr-5 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Back</a>
                            <button type="submit"
                                class="inline-flex  justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Save</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('css2'); ?>
    <style>
        input[type="date"],
        input[type="time"] {
            background-color: #f0fdf4;
            border-color: #38a169;
            color: #22543d;
        }

        input[type="date"]:focus,
        input[type="time"]:focus {
            border-color: #38a169;
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.5);
        }

        input[type="date"]::-webkit-calendar-picker-indicator,
        input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(50%) sepia(100%) saturate(300%) hue-rotate(100deg);
        }

        .Events {
            background-color: #057A55;
            color: white;
        }

        .TimeTable {
            background-color: white;
            color: #057A55;
        }

        .Events:hover {
            background-color: #057A55;
        }

        .TimeTable:hover {
            background-color: rgb(243 244 246);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            toastr.options = {
                "positionClass": "toast-top-center",
            };

            $('#storeEvent').on('submit', function (event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log('Success response:', response);
                        toastr.success(response.message || 'Event added successfully!');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error response:', xhr.responseText);

                        let errorMessage = 'An error occurred.';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = Object.values(xhr.responseJSON.errors).flat();
                            errorMessage = errors.join('<br>');
                        }
                        toastr.error(errorMessage);
                    }
                });
            });
        });


    toastr.options = {
        "positionClass": "toast-top-center",
    };
    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(Auth::user()->role . '.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/event/addEvent.blade.php ENDPATH**/ ?>