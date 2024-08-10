

<?php $__env->startSection('heading'); ?>
<div class="font-bold text-xl text-green-600">
    <span class="font-extrabold">TimeTable - </span><?php echo e($name ?? 'N/A'); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full h-full flex justify-center items-center pb-4">
    <form id="timetableForm"
        class="w-5/6 h-4/6 justify-center items-center flex flex-col rounded-lg shadow-lg shadow-green-600 bg-blend-lighten"
        action="<?php echo e(route('addTimeTable')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <input type="hidden" id="id" value=<?php echo e($id); ?>>

        <div class="w-5/6 h-full flex flex-col justify-between items-center p-8">
            <h1 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-green-600 md:text-3xl lg:text-3xl">
                Update TimeTable Data</h1>
            <div class=" grid grid-cols-3 gap-x-6 gap-y-6 sm:grid-cols-6 w-full">

                <div
                    class="sm:col-span-3 font-bold text-lg px-6 py-2 rounded-lg flex justify-center bg-green-600 text-white">
                    Batch : <span><?php echo e($batchName); ?></span></div>
                <div
                    class="sm:col-span-3 font-bold text-lg px-6 py-2 rounded-lg flex justify-center bg-green-600 text-white">
                    Subject : <span><?php echo e($subjectName); ?></span></div>

                <div class="sm:col-span-2">
                    <label for="startTime" class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                    <button id="dropdownHoverButton2"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Start Time
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="startTime" name="startTime">
                    <div id="dropdownHover2"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton2">
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="10:00AM">10:00AM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="10:40AM">10:40AM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="11:20AM">11:20AM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="12:00PM">12:00PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="12:40PM">12:40PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="01:20PM">01:20PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="02:00PM">02:00PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="02:40PM">02:40PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="03:20PM">03:20PM</a></li>
                        </ul>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="teacherName" class="block text-sm font-medium text-gray-700 mb-2">Teacher Name</label>
                    <button id="dropdownHoverButton3"
                        class="w-full text-white bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Teacher Name
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="teacherName" name="teacher_name">
                    <div id="dropdownHover3"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton3">
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                        data-value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->first_name); ?><?php echo e($teacher->last_name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="relative inline-block text-left min-w-52 ml-9">
                    <label for="endTime" class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                    <button id="dropdownHoverButton4"
                        class="text-white w-full bg-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        End Time
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <input type="hidden" id="endTime" name="endTime">
                    <div id="dropdownHover4"
                        class="dropdown-menu absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 h-32 overflow-scroll no-scrollbar">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton4">
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="10:40AM">10:40AM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="11:20AM">11:20AM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="12:00PM">12:00PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="12:40PM">12:40PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="01:20PM">01:20PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="02:00PM">02:00PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="02:40PM">02:40PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="03:20PM">03:20PM</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-600 dropdown-item hover:text-white"
                                    data-value="04:00PM">04:00PM</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-6 w-full mt-6">
                <div class="relative inline-block text-left min-w-52 gap-x-6">

                    <a href="#" onclick="goBack()"
                        class="rounded-md text-green-500 px-4  py-2 text-sm font-semibold hover:text-white hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Back</a>

                    <button type="button" id="saveButton"
                        class="rounded-md bg-green-600 ml-16 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

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

    function setupDropdown(dropdownButtonId, dropdownMenuId, hiddenInputId, callback) {
        const dropdownButton = document.getElementById(dropdownButtonId);
        const dropdownMenu = document.getElementById(dropdownMenuId);
        const hiddenInput = document.getElementById(hiddenInputId);

        dropdownButton.addEventListener('mouseover', () => {
            dropdownMenu.classList.add('show');
        });

        dropdownButton.addEventListener('mouseout', () => {
            dropdownMenu.classList.remove('show');
        });

        dropdownMenu.addEventListener('mouseover', () => {
            dropdownMenu.classList.add('show');
        });

        dropdownMenu.addEventListener('mouseout', () => {
            dropdownMenu.classList.remove('show');
        });

        document.querySelectorAll(`#${dropdownMenuId} .dropdown-item`).forEach(function (item) {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                const selectedItemText = this.textContent;
                const selectedValue = this.getAttribute('data-value');

                dropdownButton.textContent = selectedItemText;
                hiddenInput.value = selectedValue;

                if (callback) callback(selectedValue);

                dropdownMenu.classList.remove('show');
            });
        });
    }

    function calculateEndTime(startTime) {
        const timeMap = {
            "10:00AM": "10:40AM",
            "10:40AM": "11:20AM",
            "11:20AM": "12:00PM",
            "12:00PM": "12:40PM",
            "12:40PM": "01:20PM",
            "01:20PM": "02:00PM",
            "02:00PM": "02:40PM",
            "02:40PM": "03:20PM",
            "03:20PM": "04:00PM",
        };
        return timeMap[startTime] || "04:00PM";
    }

    setupDropdown('dropdownHoverButton2', 'dropdownHover2', 'startTime', (startTime) => {
        const endTime = calculateEndTime(startTime);
        document.getElementById('endTime').value = endTime;
        document.getElementById('dropdownHoverButton4').textContent = endTime;
    });

    setupDropdown('dropdownHoverButton3', 'dropdownHover3', 'teacherName');
    setupDropdown('dropdownHoverButton4', 'dropdownHover4', 'endTime');

    $('#saveButton').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: $('#timetableForm').attr('action'),
            type: 'POST',
            data: $('#timetableForm').serialize(),
            success: function (response) {
                toastr.success('Timetable updated successfully');
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel project\attendance-Management\resources\views/admin/updateTimeTable.blade.php ENDPATH**/ ?>