

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl text-green-600">
    <span class="font-extrabold"><?php echo e(ucfirst($userrole)); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form class="w-5/6 h-4/5 justify-center items-center flex rounded-lg shadow-xl  bg-blend-lighten"
    action="<?php echo e(route('password.update')); ?>" method="PUT" id="ResetForm">
    <?php echo csrf_field(); ?>
    <div class="w-full h-full flex flex-row justify-center items-center border-green-600 py-10">
        <div>
            <img src="img/clg.png" alt="">
        </div>

        <div class="w-1/2 px-10">
            <h1 class="text-lg font-semibold leading-7 text-green-600">Reset password</h1>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="course-name" class="block text-sm font-medium leading-6 text-green-600">Current Passward
                    </label>
                    <div class="mt-2">
                        <input type="text" name="current_password" id="current_password" autocomplete="current_password"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
                            required>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="course-name" class="block text-sm font-medium leading-6 text-green-600">New Passward
                    </label>
                    <div class="mt-2">
                        <input type="text" name="password" id="password" autocomplete="password"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
                            required>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="course-name" class="block text-sm font-medium leading-6 text-green-600">Confirm Passward
                    </label>
                    <div class="mt-2">
                        <input type="text" name="password_confirmation" id="password_confirmation"
                            autocomplete="password_confirmation"
                            class="block w-full rounded-md border-0 py-1.5 text-green-600 shadow-sm ring-1 ring-inset ring-green-600 placeholder:text-green-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
                            required>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <div class=" px-4 py-3 text-right sm:px-6">
                    <a href="#" onclick="goBack()"
                        class="rounded-md text-green-500 px-3  py-2 text-sm font-semibold hover:text-white hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Back</a>
                </div>
                <button type="submit" id="saveButton"
                    class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Save</button>
            </div>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css2'); ?>
    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.25rem;
            z-index: 1000;
            max-height: 10rem;
            /* overflow-y: scroll; */
        }

        .dropdown-menu.show {
            display: block;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
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
                url: $('#ResetForm').attr('action'),
                type: 'POST',
                data: $('#ResetForm').serialize(),
                success: function (response) {
                    toastr.success('Course added successfully');
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
<?php $__env->stopPush(); ?>
<?php $__env->startPush('toast'); ?>
    <style>
        .toast-container {
            top: 20px
        }

        .toast {
            border-radius: 30px margin-top: 20px
        }

        .toast-success {
            background-color: #38a169;

        }

        .toast-error {
            background-color: #e53e3e;
        }

    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($userrole . '.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/common/reset.blade.php ENDPATH**/ ?>