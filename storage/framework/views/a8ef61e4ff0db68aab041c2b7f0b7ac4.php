

<?php $__env->startSection('info'); ?>
<form class="w-5/6 h-5/6 justify-center items-center flex rounded-lg shadow-xl bg-blend-lighten"
    action="<?php echo e(route('DepartmentSave')); ?>" method="POST" id="DepartmentForm">
    <?php echo csrf_field(); ?>
    <div class="w-full h-full flex flex-row justify-center items-center border-b border-green-600 py-10">
        <div>
            <img src="img/clg.png" alt="">
        </div>
        <div class="w-1/2 px-10 border-green-60 overflow-scroll no-scrollbar">
            <h1 class="text-lg font-semibold leading-7 text-green-600">Add Department</h1>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
               
                <div class="sm:col-span-6">
                    <label for="departmentName" class="block text-sm font-medium leading-6 text-green-600">Department
                        Name</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="departmentName" autocomplete="department-name"
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

                <div class="sm:col-span-6">
                    <label for="notes" class="block text-sm font-medium leading-6 text-green-600">Additional Notes
                        (Optional)</label>
                    <div class="mt-2">
                        <textarea id="notes" name="notes" rows="4"
                            class="block h-20 w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"></textarea>
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
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6 ">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900 ">
                    <a href="<?php echo e(route('DepartmentForm')); ?>"
                        class="rounded-md text-green-500 px-3  py-2 text-sm font-semibold hover:text-white hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Reset</a>
                </button>
                <button type="submit" id="saveButton"
                    class=" rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Save
                </button>
            </div>
        </div>
    </div>
</form>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
  $(document).ready(function () {
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
            $('#DepartmentForm').on('submit', function (event) {
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
        .Student {
            background-color: white;
            color: #057A55;
        }

        .Teacher {
            background-color: white;
            color: #057A55;
        }

        .Subject {
            background-color: white;
            color: #057A55;
        }

        .Department {
            background-color: #057A55;
            color: white;
        }

        .Course {
            background-color: white;
            color: #057A55;
        }

        .Batch {
            background-color: white;
            color: #057A55;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/admin/addDepartment.blade.php ENDPATH**/ ?>