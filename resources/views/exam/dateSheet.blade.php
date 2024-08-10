@extends($userrole . '.layout')

@section('heading')
<div class="text-xl text-green-600 font-extrabold flex flex-row items-center h-1/6">
    Class - 
    <ul class="relative">
    @if($userrole == 'teacher')
        <li class="inline-block">
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                class="flex items-center justify-between w-full text-green-600 rounded focus:outline-none">
                <span id="dropdownNavbarText">{{ $selectedBatch ? $selectedBatch->batch_name : 'Select Class' }}</span>
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <div id="dropdownNavbar"
                class="w-36 max-h-40 dropdown-menu z-10 hidden font-normal absolute bg-white divide-y divide-gray-100 rounded-lg shadow overflow-scroll no-scrollbar">
                <ul class="py-2 text-sm text-green-600" aria-labelledby="dropdownNavbarLink">
                @forelse ($batches as $batch)
                    <li>
                        <a href="{{ route('adminTimeTable', ['id' => $batch->id]) }}"
                           class=" ml-2 courseName block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">
                            {{ $batch->batch_name }}
                        </a>
                    </li>
                @empty
                    <li>
                        <a href="#"
                           class="ml-2 courseName block px-4 py-2 text-green-600 hover:text-white hover:bg-green-600 rounded-lg">
                            No Class
                        </a>
                    </li>
                @endforelse
                </ul>
            </div>
        </li>
        @else
        <li><span id="dropdownNavbarText " class="ml-2"> {{ $selectedBatch ? $selectedBatch->batch_name : 'Select Class' }}</span></li>
        @endif
    </ul>
</div>
@endsection

@section('content')
<div class="w-5/6 h-4/5  mx-auto ">
    <div class="font-bold text-xl text-green-600 text-center mb-3 ">
        <span class="font-extrabold">Exam DateSheet</span>
    </div>
    @if($userrole=="teacher")
    <div class="text-right mb-4 forteacher ">
        <a href={{ route('CreateDateSheet', ['batchId' => $selectedBatch->id ?? 1]) }} class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Create DateSheet</a>
    </div>
    @endif
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
            @forelse ($exams as $exam)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-2">
                        {{ \Carbon\Carbon::parse($exam->exam_date)->format('Y-m-d') }}<br>
                        {{ \Carbon\Carbon::parse($exam->exam_date)->format('l') }}
                    </td>
                    <td class="px-6 py-2">{{ $exam->exam_time }}</td>
                    <td class="px-6 py-2">{{ $exam->subject_name }}</td>
                    <td class="px-6 py-2">{{ $exam->batch_name }}</td>
                    <td class="px-6 py-2">{{ $exam->group_name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-6">
                        <img src="{{ asset('img/empty.jpg') }}" alt="No Data" class="w-1/3 h-auto mx-auto">
                        <p class="mt-2 text-gray-500">No exam dates available.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('css')
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
@endpush

@push('script')
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
    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
</script>
@endpush
