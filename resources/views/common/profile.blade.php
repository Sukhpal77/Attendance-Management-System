@extends(Auth::user()->role . '.layout')

@section('heading')
<div class="font-bold text-xl text-green-600 top-0">
    <span class="font-extrabold">{{ ucfirst($userrole)}}</div>
@endsection

@section('content')

<div class="flex flex-col w-full max-w-5xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="px-4 py-5 sm:px-6 bg-green-600 rounded-t-lg">
        <h3 class="text-lg leading-6 font-medium text-white">User Information</h3>
    </div>
    <div class="flex flex-col border-t border-gray-200 overflow-y-scroll overflow-x-hidden no-scrollbar">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-6 p-6 ">
            <div class="col-span-full flex justify-center mr-10">
                <svg id="profile-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" text-green-600 w-24 h-24 cursor-pointer">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->email }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Full name</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->first_name }} {{ $user->last_name }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Father Name</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->father_name }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Mother name</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->mother_name }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">ID</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->id }}</dd>
            </div>
            @if($userrole =='student')
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Course</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $courseName }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Batch</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $batchName }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Group</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->group ?? 'Not defined' }}</dd>
            </div>
            @else
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Qualification</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->qualification }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Department</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $departmentName }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Position</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->position ?? 'Not defined' }}</dd>
            </div>
            @endif
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Mobile No.</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->number }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500 overflow-scroll no-scrollbar">Street address</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->street_address }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">City</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->city }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">State / Province</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->state }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">ZIP / Postal code</dt>
                <dd class="mt-1 text-sm text-gray-900 bg-gray-100 rounded-md p-2">{{ $user->pincode }}</dd>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
          <a href="#" onclick="goBack()" 
                class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Back</a>
        </div>
    </div>
</div>

@endsection

@push('css2')
    <style>
        .Student, .Teacher, .Course, .Subject, .Batch, .Department {
            display: none;
        }
    </style>
@endpush

@push('script')
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endpush
