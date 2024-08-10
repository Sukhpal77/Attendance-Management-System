

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl  text-green-600 ">
    <spam class="font-extrabold text-4xl">Add Data
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   
    <div>
        <form class="w-5/6 h-5/6 justify-center items-center flex rounded-lg shadow-lg shadow-green-600 bg-blend-lighten" action="<?php echo e(route('AdminSaveDemo')); ?>" method="POST" id="adminForm1">
            <?php echo csrf_field(); ?>
            <div class="w-3/5 h-full flex flex-col justify-center items-center border-b border-green-600">
                <div class="border-green-60 overflow-scroll no-scrollbar">
                    <h1 class="text-xl font-semibold leading-7 text-green-600 pt-7">Admin Information</h1>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-green-600">Email address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-green-600">First name</label>
                            <div class="mt-2">
                                <input type="text" name="first_name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-green-600">Last name</label>
                            <div class="mt-2">
                                <input type="text" name="last_name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 border-green-600 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="qualification" class="block text-sm font-medium leading-6 text-green-600">Qualification</label>
                            <div class="mt-2 w-72">
                                <input type="text" name="qualification" id="qualification" class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="department" class="block text-sm font-medium leading-6 text-green-600">Department</label>
                            <div class=" w-72 relative mt-2">
                                <button id="dropdownDepartmentButton" class="w-full text-white bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                                    Select Department
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <input type="hidden" id="selectedDepartment" name="department_id" value="1">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="mob-number" class="block text-sm font-medium leading-6 text-green-600">Mobile No.</label>
                            <div class="mt-2">
                                <input type="number" name="number" id="mob-number" autocomplete="mob-number" class="block w-full rounded-md border-0 border-green-600 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 remove-arrow">
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-green-600">Street address</label>
                            <div class="mt-2">
                                <input type="text" name="street_address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-green-600">City</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="state" class="block text-sm font-medium leading-6 text-green-600">State</label>
                            <div class="mt-2">
                                <input type="text" name="state" id="state" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="pincode" class="block text-sm font-medium leading-6 text-green-600">Pincode</label>
                            <div class="mt-2">
                                <input type="text" name="pincode" id="pincode" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="saveButton" class="mt-5 fbtn text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('js'); ?>
    <script>
       $(document).ready(function() {
    $('#adminForm1').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

$.ajax({
    url: $(this).attr('action'),
    method: 'POST',
    data: $(this).serialize(),
    success: function (response) {
                        console.log('Success response:', response);
                        toastr.success(response.message || 'Admin added successfully');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error response:', xhr.responseText);


                        let errorMessage = 'An error occurred.';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = Object.values(xhr.responseJSON.errors).flat(); // Flatten nested errors
                            errorMessage = errors.join('<br>');
                        }
                        toastr.error(errorMessage);
                    }
});
});
        });
    </script>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('css2'); ?>
    <style>
        .Student, .Teacher, .Course, .Subject, .Batch, .Department {
            display: none;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.25rem;
            z-index: 1000;
        }

        .dropdown-menu.show {
            display: block;
        }

        .fbtn {
            margin-left: 465px;
        }
    </style>
    <?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/demo.blade.php ENDPATH**/ ?>